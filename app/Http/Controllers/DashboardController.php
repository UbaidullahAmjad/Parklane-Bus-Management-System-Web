<?php

namespace App\Http\Controllers;
use App\Models\Bus;
use App\Models\Faq;
use App\Models\User;
use App\Models\About;
use App\Models\Guests;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\BusTrip;
use App\Models\busType;
use App\Models\Contact;
use App\Models\NewsUpdates;
use Illuminate\Http\Request;
use App\Models\makeYourBooking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    public function index()
    {
    $buses = Bus::all();
    $navbar= Navbar::first();
    $slider = Slider::all();
    $makeBook = makeYourBooking::first();
    $about = About::all();
    $contact = Contact::all();
    $bustype =busType::all();
    $faq = Faq::where('active',1)->get();
    $busTrips = BusTrip::all();


    $newsupdate = NewsUpdates::get();

    // $pickup_loc = DB::table('bus_trips')->select('pickup_location')->groupBy('pickup_location')->get();
    // $dropoff_loc = DB::table('bus_trips')->select('drop_off_location')->groupBy('drop_off_location')->get();

    $pickup_loc = DB::table('bus_trips')->select('pickup_location')->groupBy('pickup_location')->get();
    $dropoff_loc = DB::table('bus_trips')->select('drop_off_location')->groupBy('drop_off_location')->get();

    // dd($dropoff_loc);

    // dd($pickup_loc);

    Session::forget('busTripId');
    Session::forget('BusSchedule');
    Session::forget('busTripId');
    Session::forget('seat');
    Session::forget('return_bus_id');
    Session::forget('return_bustrip_id');
    Session::forget('price');
    Session::forget('priceR');
    Session::forget('user_id');
    Session::forget('user_email');
    Session::forget('bustrip');
    Session::forget('seats');
    Session::forget('return_seats');

    $val = Session::get('values');
    // dd($val);

    // $user_email = User::findorfail(63);
    // dd($user_email->verifyUser->token);


        return view('frontend.index',compact('newsupdate','buses','navbar','slider','makeBook',
        'about','contact','contact','bustype','faq','busTrips','pickup_loc','dropoff_loc'));
    }

    public function search(Request $request){

        // dump($request->all());

        // dd($request->all());


        // dd(Session::get('bustrip'));


        // dd($seats);



        if(Session::get('bustrip') == null){
                    $validator_basic = Validator::make($request->all(),[
                        'pickup_location'=>'required',
                        'drop_off_location'=>'required',
                        'pickup_date'=>'required',
                        'drop_off_date'=>'required',
                        'pick_up_time'=>'required',
                        'drop_off_time'=>'required',
                        'adult_seat'=>'required',

                    ]);

                    if($validator_basic->fails())
                    {
                        return back()->withErrors($validator_basic);
                    }
                    // dump("HERE");
                    $req = $request->all();

                    $seats = $request->adult_seat + $request->child_seat;
                    $bus_trip = DB::table('bus_trips')
                    ->join('buses','buses.id','=','bus_trips.bus_id')
                    ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
                    ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
                    ->Where('bus_trips.pickup_date','>=',$request->pickup_date)
                        // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
                    ->Where('bus_trips.drop_off_date','<=',$request->drop_off_date)
                    ->Where('bus_trips.pickup_time','=',$request->pick_up_time)
                    ->Where('bus_trips.drop_off_time','=',$request->drop_off_time)
                    ->Where('bus_trips.left_seat','>=',$seats)
                    ->where(['bus_trips.active'=>1])
                    ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
                    ->get();


                if($bus_trip->isEmpty())
                {
                    return back()->with('message','There Are not any type of trip exist ! Please choose an existing locations');
                }
                else{


                    // $pickup_loc = "";
                    // $dropoff_loc="";

                    // if($bustrip){
                    // $pickup_loc = DB::table('bus_trips')->select('pickup_location')->groupBy('pickup_location')->get();
                    // $dropoff_loc = DB::table('bus_trips')->select('drop_off_location')->groupBy('drop_off_location')->get();
                    // }

                    //  dd($bustrip);
                    $all_searched_buses = [];
                    foreach($bus_trip as $findBusTrips)
                    {
                        $pickup_location = $findBusTrips->pickup_location;
                        $drop_off_location = $findBusTrips->drop_off_location;
                        $pickup_date = $findBusTrips->pickup_date;
                        $drop_off_date = $findBusTrips->drop_off_date;
                        $left_seat = $findBusTrips->left_seat;

                        $busType_id = $findBusTrips->busType_id;
                        $bustrip = $findBusTrips;

                        $slider = Slider::all();
                        $busTrips = BusTrip::all();
                        $all_searched_buses[] = Bus::findorfail($busType_id);
                        $navbar= Navbar::first();
                        $makeBook = makeYourBooking::first();
                        $about = About::all();
                        $contact = Contact::all();
                        $bustype =busType::all();
                        $faq = Faq::where('active',1)->get();
                        $newsupdate = NewsUpdates::first();

                        // dump($busType_id);
                    }
                Session::put('bustrip',$bustrip);
                Session::put('seats',$seats);

                if(isset($request->return_trip))
                {
                    $validator_return_trip = Validator::make($request->all(),[
                        'return_pickup_date'=>'required',
                        'return_pickup_time'=>'required',
                        'return_dropoff_date'=>'required',
                        'return_drop_off_time'=>'required',
                        'return_adult_seat'=>'required',
                    ]);


                    if($validator_return_trip->fails())
                    {
                        return back()->withErrors($validator_return_trip);
                    }
                    // $pickup_loc = str_replace(' ','',$request->pickup_location);
                    // $dropoff_loc = str_replace(' ','',$request->drop_off_location);
                    $pickup_loc = $request->pickup_location;
                    $dropoff_loc = $request->drop_off_location;
                    $return_seats = $request->return_adult_seat + $request->return_child_seat;
                    // dump($pickup_loc);
                    // dump($dropoff_loc);
                    // dump($request->pickup_date);
                    // dd($request->drop_off_date);


                    $return_bustrip = DB::table('bus_trips')
                    ->join('buses','buses.id','=','bus_trips.bus_id')
                    ->where('bus_trips.pickup_location','LIKE', '%' .$dropoff_loc .'%')
                    ->where('bus_trips.drop_off_location','LIKE', '%' .$pickup_loc .'%')
                    ->Where('bus_trips.pickup_date','>=',$request->return_pickup_date)
                    // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
                    ->Where('bus_trips.drop_off_date','<=',$request->return_dropoff_date)
                    ->Where('bus_trips.pickup_time','=' ,$request->return_pickup_time)
                    ->Where('bus_trips.drop_off_time','=',$request->return_drop_off_time)
                    ->Where('bus_trips.left_seat','>=',$return_seats)
                    ->where(['bus_trips.active'=>1])
                    ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
                    ->first();

                    if($return_bustrip == null)
                    {
                        return back()->with('message','Location does not contain return trip ! It is one-way route');
                    }

                    // dd($return_bustrip);

                    $return_bus_id =  $return_bustrip->bus_id;
                    $return_bustrip_id = $return_bustrip->id;


                    Session::put('return_bus_id',$return_bus_id);
                    Session::put('return_bustrip_id',$return_bustrip->id);
                    Session::put('return_seats',$return_seats);
                }
            }
        }
        else
        {
            $bustrip = Session::get('bustrip');
            $seats = Session::get('seats');
            $return_seats = Session::get('return_seats');
        }


        //  dd($bustrip->bus_id);


        // if(!$bustrip->isEmpty()){
        //     if($seats > $bustrip->left_seat)
        //     {
        //         return back()->with('message','Seats Limit is'.$bustrip->left_Seat);
        //     }
        // }


        //  dd("HERE");
        //  dd($pickup_location);
        //  dd($all_searched_buses);

        // dd(Session::all());

            $slider = Slider::all();
            $navbar= Navbar::first();
            $makeBook = makeYourBooking::first();
            $about = About::all();
            $contact = Contact::all();
            $bustype =busType::all();
            $faq = Faq::where('active',1)->get();

            Session::forget('user_id');

        return view('frontend.schedule-trips1',compact('navbar','slider',
        'makeBook','about','contact','bustype','faq','bustrip','seats'));


        // return view('frontend.index',compact('pickup_location','drop_off_location','pickup_date','drop_off_date','left_seat','req',
        // 'newsupdate','all_searched_buses','navbar','slider','makeBook',
        // 'about','contact','contact','bustype','faq','busTrips','pickup_loc','dropoff_loc'));
        //  }
    }
}


