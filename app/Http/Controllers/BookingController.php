<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\BusTrip;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;
use Illuminate\Validation\Rules;
use willvincent\Rateable\Rating;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus= Bus::all();
        $bustrip = BusTrip::all();
        return view('admin.bustrip.booking.create',compact('bus','bustrip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $bustrip = DB::table('bus_trips')
            ->join('buses','buses.id','=','bus_trips.bus_id')
            ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
            ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
            ->orWhere('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
             ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
             ->orWhere('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
             ->select('*','bus_trips.id')
             ->first();
        //    dd($bustrip);

           if($bustrip === null)
           {
               return back()->with('status','MisMatch the bus trip');
           }
    else {

        $data=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => ['required', 'unique:users'],
            'password' => 'required|confirmed',
        ]);
        $token = "9e7cff902f36db9363ecca0512faa94e";
        $twilio_sid = "ACad62fedb0f642dc64068c2852a8f0fb3";
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        // dd($data['phone']);
        $twilio->verify->v2->services("VA04b04413075a7d6e8ee6853b920ba268")
            ->verifications
            ->create($data['phone'], "sms");
            // dd($twilio);




                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'usertype' => $request->usertype,
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);


                 return redirect()->route('booking.verify')->with(['bus_id',$request->bus_id,
                 'phone' => $request->phone,'user'=>$user->id,'bustrip'=>$bustrip->id,
                  'seat' =>Session::get('seat')]);
             }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        $user = User::where('id',$booking->user_id)->first();
        $bus= Bus::all();
        $bustrip = BusTrip::where('id',$booking->bustrip_id)->first();
        return view('admin.bustrip.booking.edit',compact('bus','bustrip','booking','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        $bustrip = DB::table('bus_trips')
        ->join('buses','buses.id','=','bus_trips.bus_id')
        ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
        ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
        ->orWhere('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
         ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
         ->orWhere('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
         ->select('*','bus_trips.id')
         ->first();

         if($bustrip === null)
         {
             return back()->with('status','MisMatch the bus trip');
         }
  else {
        $user = User::where('id',$request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);



        $booking =  Booking::find($id);
        $booking->booking_no = $request->booking_no;
        $booking->seat_no = Session::get('seat');
        $booking->user_id = $request->user_id;
        $booking->bustrip_id =$request->bustrip_id;

        $booking->save();

        return redirect()->route('bustrip.details');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function bookingVerify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);


        /* Get credentials from .env */
        $token = "9e7cff902f36db9363ecca0512faa94e";
        $twilio_sid = "ACad62fedb0f642dc64068c2852a8f0fb3";
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services("VA04b04413075a7d6e8ee6853b920ba268")
                                         ->verificationChecks
                                         ->create($request->verification_code, // code
                                                  ["to" => $request->phone]
                                         );

        if ($verification->valid) {
            $user = tap(User::where(['id'=>$request->user_id,'phone', $data['phone']]))->update(['isVerified' => true]);

            $booking = new Booking;
            $booking->booking_no = 'PK-'.mt_rand(100000,999999);
            $booking->seat_no = Session::get('seat');
            $booking->user_id = $request->user_id;
            $booking->bustrip_id =$request->bustrip_id;
            $booking->confirmation_code =$request->verification_code;
            $booking->status = 1;
            $booking->save();

            return redirect()->route('bustrip.details')->with('status' ,'Booking Successfully Created');

        }
        return back()->with(['phone' => $data['phone'], 'error' => 'Invalid verification code entered!']);

    }


    //user booking view method

    public function userBooking($user,$booking)
    {
    //   dd($user);

       Booking::where(['id'=>$booking,'user_id'=>$user])->update([
                 'status'=>0
                ]);

                return back()->with('cancel','Cancel  booking Successfully');
    }

    public function userModifyBooking(Request $request,$user,$booking)
     {
       dd('asdas');
     }

     public function userViewBooking()
     {
        $buses = Bus::all();
        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();


    // $ratings = Rating::where('user_id',auth()->user()->id)->get();
//    dd($ratings);
         $userBooking = Booking::where('user_id',Auth::user()->id)->get();

         $userTotalRides= Booking::where(['user_id'=>Auth::user()->id])->count();
         $userActiveRides= Booking::where(['user_id'=>Auth::user()->id,'status'=>1,'active'=>0])->count();
         $userCompleteRides= Booking::where(['user_id'=>Auth::user()->id,'status'=>1,'active'=>1])->count();

         return view('frontend.booking.index',compact('userBooking','buses','navbar'
                                                    ,'slider','makeBook','about',
                                                     'contact','bustype','faq',
                                                     'userTotalRides','userActiveRides','userCompleteRides'));
      }


   // Admin  side confirm booking
   public function checkBooking()
   {
       $buses = Bus::all();
       return view('admin.booking.confirm',compact('buses'));
   }

   public function bookingConfirmed($id)
   {
       $bustrip = BusTrip::where(['id'=>$id , 'active'=>1])->first();

       $booking = Booking::where(['bustrip_id'=>$bustrip->id,'status'=>1,'active'=>0])->get();
        // dd($booking);
       return view('admin.booking.complete',compact('booking','bustrip'));
   }

   public function bookingCompleted($id)
   {
    //   dd($id);
        $bustrip = BusTrip::where(['id'=>$id , 'active'=>1])->first();

       $booking = Booking::where(['bustrip_id'=>$bustrip->id,'status'=>1,'active'=>0])->get();
    //   dd($booking);

    if(!$booking->isEmpty())
    {
       foreach($booking as $book)
       {
             $bustrip = BusTrip::where(['id'=>$book->bustrip_id , 'active'=>1])->first();
        //   dd($book);
             $bustrip->status =1;
             $bustrip->save();
             $book->active = 1;
             $book->save();

             $subject = "Complete your trip";
             $message = "Booking No : ".$book->booking_no."\n"." "."Trip date :".$book->bustrip->pickup_date."  Trip time :".$bustrip->pickup_time."\n"." "."Trip Drop Of Date : ".$book->bustrip->drop_off_date."  Trip drop of time : ".$book->bustrip->drop_off_time."\n"." "."No of Seat : ".$book->seat_no;
            // dd($message);
            if($book->user){
                $retval = mail ($book->user->email,$subject,$message);
            }
             

       }
       return back()->with('status','successfully complete the trips');
     }
   else
   {
       return back()->with('error','MisMatch the Id');
   }
   }
}
