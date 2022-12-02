<?php

namespace App\Http\Controllers;

use App\Models\BusTrip;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\About;
use App\Models\Booking;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use willvincent\Rateable\Rating;
use App\Http\Controllers\PaypalController;
use App\Mail\VerifyEmail;
use App\Models\Guests;
use App\Models\VerifyUser;
use DateTime;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use Ramsey\Uuid\Rfc4122\UuidV3;
use Illuminate\Support\Str;

class BusTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bustrip = BusTrip::where('active',1)->get();
        $bus = Bus::where('active',1)->get();
        return view('admin.bustrip.index',compact('bustrip','bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->validate([
            'pickup_location' => 'required',
            'drop_off_location'=>'required',
            'pickup_date'=>'required',
            'pickup_time' =>'required',
            'drop_off_date' => 'required',
            'drop_off_time' => 'required',


          ]);
          $bus = Bus::find($request->bus_id);
        //   dd($bus);

          $created_at = Carbon::now();
          $request->merge(['created_at'=>$created_at ,'left_seat'=>$bus->no_of_seat]);

        $bustrip = new BusTrip;
        $bustrip->insert($request->only($bustrip->getFillable()));

        return back()->with('message','Inserted Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusTrip  $busTrip
     * @return \Illuminate\Http\Response
     */
    public function show(BusTrip $busTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusTrip  $busTrip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bustrip = BusTrip::find($id);
        $bus = Bus::all();
        return view('admin.bustrip.edit',compact('bustrip','bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusTrip  $busTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

          $created_at = Carbon::now();
          $request->merge(['created_at'=>$created_at]);

        $bustrip = BusTrip::find($id);

        $bustrip->update($request->only($bustrip->getFillable()));

        return redirect()->route('bustrip.index')->with('update','Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusTrip  $busTrip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusTrip::find($id)->delete();
        return back()->with('delete','delete Succesfully');
    }

    public function busTripDetails()
    {
      $bustrip = BusTrip::all();
      $booking = Booking::where('status',1)->get();
      $buses= Bus::all();
     return view('admin.bustrip.details',compact('booking','buses','bustrip'));
    }
    //Report
    public function busWiseDetails($id)
    {
        $bus = Bus::find($id);
      $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->select('*','users.id')
                   ->get();
                //   dd($busWiseTrip->);
     return view('admin.bustrip.bustripreports.index',compact('busWiseTrip','bus'));
    }

   // Monday
       public function mondayTrip(Request $request)
       {

               $myday = Carbon::MONDAY;
                if($myday == "1")
                {
                   $day = "Monday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>

                                             <td>'.$i++.'</td>
                                              <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }
                  $monday = "Monday";
               return response()->json(['temp'=>$temp,'monday'=>$monday]);
       }
  // Tuesday
   public function tuesdayTrip(Request $request)
       {

               $myday = Carbon::TUESDAY;
                if($myday == "2")
                {
                   $day = "Tuesday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                              <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

               $tuesday = "Tuesday";
               return response()->json(['temp'=>$temp,'tuesday'=>$tuesday]);
       }
 /// Wednesday
    public function wednesdayTrip(Request $request)
       {

               $myday = Carbon::WEDNESDAY;
                if($myday == "3")
                {
                   $day = "Wednesday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                             <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

                 $wednesday = "Wednesday";
               return response()->json(['temp'=>$temp,'wednesday'=>$wednesday]);
       }

 /// Thuresday
    public function thursdayTrip(Request $request)
       {

               $myday = Carbon::THURSDAY;
                if($myday == "4")
                {
                   $day = "Thursday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                             <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

                $thursday = "Thursday";
               return response()->json(['temp'=>$temp,'thursday'=>$thursday]);
       }
/// Friday
   public function fridayTrip(Request $request)
       {

               $myday = Carbon::FRIDAY;
                if($myday == "5")
                {
                   $day = "Friday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                             <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

               $friday = "Friday";
               return response()->json(['temp'=>$temp,'friday'=>$friday]);
       }

     ///Saturday
      public function saturdayTrip(Request $request)
       {

               $myday = Carbon::SATURDAY;
                if($myday == "6")
                {
                   $day = "Friday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                             <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

                 $saturday = "Saturday";
               return response()->json(['temp'=>$temp,'saturday'=>$saturday]);
       }
       //SUNDAY
       public function sundayTrip(Request $request)
       {

               $myday = Carbon::SUNDAY;
                if($myday == "0")
                {
                   $day = "Friday";
                }
                else
                {
                    dd('asdas');
                }
                //   dd($day);
             $bus = Bus::find($request->id);
             $busWiseTrip =DB::table('bookings')
                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                   ->join('users','users.id','=','bookings.user_id')
                   ->join('buses','buses.id','=','bus_trips.bus_id')
                   ->where('bus_trips.bus_id',$bus->id)
                   ->where('bus_trips.pickup_date',$day)
                   ->where(['bus_trips.active'=>1,'bus_trips.status'=>1])
                   ->select('*','users.id','users.name')
                   ->get();

            //   dd($busWiseTrip);
               $temp = null;
               $i = 1;
               foreach($busWiseTrip as $book)
               {

                    $temp .='<tr>
                                             <td>'.$i++.'</td>
                                             <td>'.$book->booking_no.'</td>
                                             <td>'.$book->bustrip_id.'</td>
                                             <td>'.$book->pickup_location .'</td>
                                             <td>'.$book->drop_off_location.'</td>

                                             <td>'.$book->seat_no.'</td>
                                             <td><span class="mb-2 mr-2 badge badge-success">Complete</span>
                                                </td>
                                              <td>'.$book->name.'</td>

                                         </tr>';
               }

               $sunday = "Sunday";
               return response()->json(['temp'=>$temp,'sunday'=>$sunday]);
       }


    public function viewDetails($id)
   {
      $booking = Booking::find($id);

      return view('admin.bustrip.more-detail',compact('booking'));
   }

    public function cancelBooking($id)
    {
         $booking=Booking::find($id);
         $booking->status = 0;
         $booking->update();

         return back()->with('cancel','Cancel Your Trip Successfully');

    }

    public function feedback()
    {
        $feedback = Rating::all();
        $bustrip = BusTrip::all();
        return view('admin.feeedback.index',compact('feedback','bustrip'));
    }


    //Front End Show
    public function schedule()
    {
        $user= Auth::user()->id;
        $buses = Bus::paginate(6);
        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();
        $booking = Booking::where(['status'=>1, 'active'=>1,'user_id'=>$user])->get();
        return view('frontend.travel-tip-info',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq','booking'));

    }

    public function busSearch(Request $request)
    {

        //   dump($request->all());
        // //   dump($id);


        // dd($request->fullUrl());


        //    dd($request->seat);
        $req = $request->all();
        // dump($req);

        // dump("HERE");
            if($request->pickup_location !=null && $request->seat != null){
                Session::put(['busTripId'=>$request->buss_id]);

                $seat = $request->seat;
                // Session::put('seat',$seat);

                $bustrip = DB::table('bus_trips')
                ->join('buses','buses.id','=','bus_trips.bus_id')
                ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
                ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
                ->Where('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
                 // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
                ->Where('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
                ->where(['bus_trips.active'=>1])
                ->where(['bus_trips.id'=>$request->buss_id])
                ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
                ->first();

                // dd($bustrip);




                if($bustrip != null)
                {
                        // Booking count

                        // $find_bus_trip = BusTrip::findorfail($bustrip->id);
                        // $total_left_seats = $find_bus_trip->left_seat - $seat;
                        // $find_bus_trip->left_seat = $total_left_seats;
                        // $find_bus_trip->save();

                    //   $bookingCount = Booking::where('bustrip_id',$bustrip->id)->count();
                    //   $total = $bustrip->left_seat - $bookingCount;
                    //   dd($total);
                    //  dd($bookingCount);
                    $start = $request->pickup_time;
                    $startdate =$request->pickup_date;
                    // pickup_date from database and convert into day

                    $start_date = date("D", strtotime($startdate));
                    // dd($start_date);
                    //get now day
                    $date= Carbon::now()->format('d-m-Y');
                    // dd($date);
                    $day = Carbon::now()->format('D');
                    // dd($day);
                    $todayDate = Carbon::now()->format('H:i:m');
                    // dd($todayDate);
                    $comp=date('H:i:s',strtotime('-30 minutes',strtotime($start)));
                    //   dd($comp);

                    // Current date Logic
                    //  if($day == $start_date)
                    //  {
                    //      if($todayDate <= $comp)
                    //      {

                    //         if( $seat<= $total)
                    //         {
                    //             $navbar= Navbar::first();
                    //             $slider = Slider::all();
                    //             $makeBook = makeYourBooking::first();
                    //             $about = About::all();
                    //             $contact = Contact::all();
                    //             $bustype =busType::all();
                    //             $faq = Faq::where('active',1)->get();

                    //              Session::put(['seat'=>$seat,'booking_date'=>$date]);


                    //             return view('frontend.schedule-trips1',compact('navbar','slider','makeBook',
                    //                'about','contact','bustype','faq','bustrip','seat'));
                    //         }
                    //      }

                    //  }

                    //  elseif($seat<= $total)
                    //  {
                }
            }
            else{
                $busSchedule = $request->session()->get('BusSchedule');
                $bustrip = DB::table('bus_trips')
                ->join('buses','buses.id','=','bus_trips.bus_id')
                ->where('bus_trips.pickup_location','LIKE', '%' .$busSchedule->pickup_location .'%')
                ->where('bus_trips.drop_off_location','LIKE', '%' .$busSchedule->drop_off_location .'%')
                ->Where('bus_trips.pickup_date','LIKE', '%' .$busSchedule->pickup_date .'%')
                 // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
                ->Where('bus_trips.drop_off_date','LIKE', '%' .$busSchedule->drop_off_date .'%')
                ->where(['bus_trips.active'=>1])
                ->where(['bus_trips.id'=>$busSchedule->id])
                ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
                ->first();
            }

        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();



        return view('frontend.schedule-trips1',compact('navbar','slider','makeBook',
        'about','contact','bustype','faq','bustrip','seat'));

        //      else{
        //         return back()->with('message','OOps there have no trip ! Sorry');
        //           }

        // }
        //       else{
        //       return back()->with('message','There Are not any type of trip exist ! Please set an existing locations');
        //         }



    }

    public function payment(Request $request)
    {

        // dd(uniqid());
        // dd('+237'.$request->phone);


        // dump(Session::all());
        // dd($request->all());

        $request->validate([
            'email'=>'email',
            'phone'=>'numeric',
        ]);

        $seats = $request->seat;

        Session::forget('success');

        $message = null;

        if(Auth::user() == null)
        {
            // $buses = Bus::where('id',$request->bus_id)->first();
            // $bustrip = BusTrip::where('id',$request->bustrip_id)->first();
            //dd($request);
            //  Session::put(['booking_date'=>$request->booking_date]);

            //  $booking_date = $request->booking_date;


            $random_unique_id = uniqid();


            if(Session::get('user_id') == null){
            $user = new Guests();
            $user->name="guest".$random_unique_id;
            $user->first_name = "guest".$random_unique_id;
            $user->last_name = "guest".$random_unique_id;
            $user->email = $request->email;
            $user->phone = '+92'.$request->phone;
            $user->address = $request->address;
            $user->save();


            $user_id = $user->id;
            Session::put('user_id',$user_id);
            $user_email = Guests::findorfail($user_id)->email;
            Session::put('user_email',$user_email);

            $message = 'Please click on the link sent to your email';

            VerifyUser::create(['token'=>Str::random(60),'user_id'=>null,
            'guest_id'=>$user_id]);

            // dd($user->email);


            Mail::to($user_email)->send(new VerifyEmail($user));

            }
            else{
                $message = 'Your e-mail is already verified. You can proceed further.';
            }

            // if($request()->session()->get('return_bus_id')!=null)
            // {
                // $pickup_loc = str_replace(' ','',$request->pickup_location);
                // $dropoff_loc = str_replace(' ','',$request->drop_off_location);

                // dump($pickup_loc);
                // dump($dropoff_loc);

                // $buses = Bus::where('id',$request->bus_id)->first();
                // $bustrip = BusTrip::where('id',$request->bustrip_id)->first();

                //dd($request);

                // $return_bustrip = DB::table('bus_trips')
                // ->join('buses','buses.id','=','bus_trips.bus_id')
                // ->where('bus_trips.pickup_location','LIKE', '%' .$dropoff_loc .'%')
                // ->where('bus_trips.drop_off_location','LIKE', '%' .$pickup_loc .'%')
                // ->Where('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
                //  // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
                // ->Where('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
                // ->where(['bus_trips.active'=>1])
                // ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
                // ->first();

                // $return_bus_id =  $return_bustrip->bus_id;
                // $return_bustrip_id = $return_bustrip->id;
                // dd($return_bustrip);

                // dd($seat);



            // }
        }
        else{
            if(Auth::user()->email_verified_at == null){
                VerifyUser::create(['token'=>Str::random(60),
                'user_id'=>Auth::user()->id,'guest_id'=>null]);



                Mail::to(Auth::user()->email)->send(new VerifyEmail(Auth::user()));
                $message = 'Please click on the link sent to your email';
            }
            else{
                $message = 'Your e-mail is already verified. You can proceed further.';
            }
        }

        $request->session()->forget('trip');
        $buses = Bus::where('id',$request->bus_id)->first();
        $bustrip = BusTrip::where('id',$request->bustrip_id)->first();

        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();


        Session::put('success',$message);

        return view('frontend.schedule-trips2',compact('buses','navbar','slider',
            'makeBook','about','contact','bustype','faq','seats','bustrip'));
    }

    public function verifyEmail($token){




        $verifiedUser = VerifyUser::where('token',$token)->first();
        $message = 'Sorry your email cannot be identified.';
        // dd($verifiedUser->user ? $verifiedUser->user : $verifiedUser->guest);
        if(isset($verifiedUser))
        {
            $user = $verifiedUser->user ? $verifiedUser->user : $verifiedUser->guest ;
            if(!$user->email_verified_at)
            {
                $user->email_verified_at = Carbon::now();
                $user->save();
                $message = "Your e-mail is verified. You can proceed further.";
            }
            else{
                $message = "Your e-mail is already verified. You can proceed further.";
            }
        }
        $buses = Bus::where('id',Session::get('bustrip')->bus_id)->first();
        $bustrip = BusTrip::where('id',Session::get('bustrip')->id)->first();
        $seats = Session::get('seats');

        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();

        Session::put('success',$message);

        return view('frontend.schedule-trips2',compact('buses','navbar','slider',
            'makeBook','about','contact','bustype','faq','seats','bustrip'));
    }

    public function confirmBooked(Request $request)
    {

        // dd(Session::get('user_id'));
        // dump(Session::all());
        // dd($request->all());

        // dd(Auth::user());
        // dd($request->session()->all());
        // $guest = Guests::where(['id'=>Session::get('user_id'),'email'=>Session::get('user_email')])->first();
        // dd($guest);
        Session::forget('success');

        if(Auth::user() != null)
        {
            if(Auth::user()->email_verified_at == null){
                return redirect()->route('confirm_booking')->with('danger','Please verify your email to continue');
            }
        }
        else if((Guests::where(['id'=>Session::get('user_id'),'email'=>Session::get('user_email')])->first())->email_verified_at == null)
        {
            return redirect()->route('confirm_booking')->with('danger','Please verify your email to continue');
        }

        $actual_bus = Bus::findorfail($request->bus_id);
        $get_bustrip = BusTrip::where('id',$request->bustrip_id)->first();


        $return_bus_id= null;
        $return_bustrip = null;
        $total_price = null;
        $booking_date=null;
        $return_bus = null;
        $return_seats = null;

        $seats = $request->seat;

        // $total_actual_bustrip = $actual_bus->base_rate*$request->seat;
        $total_actual_bustrip = $actual_bus->base_rate*$request->seat;
        Session::put('price',$total_actual_bustrip);

        if($request->session()->get('return_bus_id') == null){
            $total_price = $total_actual_bustrip;
        }
        else{
            $return_bus = Bus::findorfail($request->session()->get('return_bus_id'));

            $return_bus_id=$request->session()->get('return_bus_id');
            $return_bustrip = $request->session()->get('return_bustrip_id');
            $return_seats = $request->session()->get('return_seats');

            $total_return_bustrip = $return_bus->base_rate*$return_seats;

            $total_actual_return = $total_actual_bustrip + $total_return_bustrip;
            $total_price = $total_actual_return;

            Session::put('priceR',$total_return_bustrip);
        }






        // dump($total_actual_bustrip);
        // dump($total_return_bustrip);
        // dd($request->all());

        // dd(Auth::user());
        $user = null;
        $phoneNo = null;
        if(Auth::user() != null)
        {
            $get_user = User::where('id',Auth::user()->id)->first();
            $user= $get_user->id;
            $phoneNo = '+'.$get_user->phone;
        }
        else{
            // dd($request->user_email);
            // dd(Guests::all());
            $get_guest = Guests::where(['id'=>$request->user_id,'email'=>$request->user_email])->first();
            $user= $get_guest->id;
            $phoneNo = $get_guest->phone;
            // dd($user);
        }

        // $buses = Bus::where('id',$request->bus_id)->first();

        $bus = $actual_bus->id;



        $bustrip = $get_bustrip->id;
        //  dd($bustrip);

        if(isset($get_guest))
        {
            $token = "e68bffd17298feff6c1c63d1fcbec3dd";
            $twilio_sid = "ACfdc5c66d074147bbee544b0fe7e5bbe6";
            //$twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);

            // dd($data['phone']);
            $twilio->verify->v2->services("VAa1bb52f3b32cdfedcdb8c4aad14ebc0f")
                ->verifications
                ->create($get_guest->phone, "sms");
        }

        // dump($total_price);
        // dd($request->all());
        // dd($return_bus);
        if(Auth::user() != null)
        {
            $verification = 0;
            $paypal = new PaypalController;
            if($request->return_bus_id == null){
                // dd("HERE");
                $index= $paypal->index($request->bustrip_id,$request->seat,$total_price,$request->bus_id,$verification);
                return $index;
            }
            else{
                // dd("EHER");
                $index= $paypal->indexWithReturn($request->bustrip_id,$request->return_bustrip_id,$request->seat,$total_price,$request->bus_id,$request->return_bus_id,$return_seats,$verification);
                return $index;
            }
        }
        if($return_bus != null){
            // dump($total_price);
            // dd($request->all());
            return view('frontend.verify-booking',compact('phoneNo','user','bus','return_bus_id','bustrip',
            'return_bustrip','return_seats','seats','total_price','booking_date'));
        }else{
            // dd($request->all());
            return view('frontend.verify-booking',compact('phoneNo','user','bus','return_bus_id','bustrip',
            'return_bustrip','return_seats','seats','total_price','booking_date'));
        }

    }

    public function verifyBooking(Request $request)
    {
            // dd($request->all());
            // dd($request->session()->get('price'));
        $buses = Bus::where('id',$request->bus_id)->first();

        // dd($request->booking_date);

        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();

        if(Auth::user() == null){
            $guest = Guests::where('id',$request->user_id)->first();
        }
        // dd($buses);
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone'=>['numeric'],
        ]);

        // dd("VERIFY");
        // dd($data);

        if(isset($guest))
        {
            // dump("GOT");

            $token = "e68bffd17298feff6c1c63d1fcbec3dd";
            $twilio_sid = "ACfdc5c66d074147bbee544b0fe7e5bbe6";
            $twilio = new Client($twilio_sid, $token);

            $verification = $twilio->verify->v2->services("VAa1bb52f3b32cdfedcdb8c4aad14ebc0f")
                                            ->verificationChecks
                                            ->create($request->verification_code, // code
                                                    ["to" =>$data['phone']]
                                            );
        }

                                        //  dd($verification);


        //  dump("VERIFY");
        if(isset($guest))
        {
            if ($verification->valid) {

            $paypal = new PaypalController;

            // dump($request->bustrip_id);
            // dump($request->seat);
            // dump($request->total_price);
            // dump($request->bus_id);
            // dump($request->verification_code);
            // dd($request->seat);
            // dd($request->return_bus_id);

            if($request->return_bus_id == null){
                // dd("HERE");
                $index= $paypal->index($request->bustrip_id,$request->seat,$request->total_price,$request->bus_id,$request->verification_code);
                return $index;
            }
            else{
                // dd("EHER");
                $index= $paypal->indexWithReturn($request->bustrip_id,$request->return_bustrip_id,$request->seat,$request->total_price,$request->bus_id,$request->return_bus_id,$request->return_seats,$request->verification_code);
                return $index;
            }
        }
        }

        return back()->with(['phone' => $data['phone'], 'error' => 'Invalid verification code entered!']);

    }
    public function rating($id)
    {
        $user = Auth::user()->id;
        $bustrip = BusTrip::find($id);
        $booking = Booking::where(['status'=>1,'active'=>0,'bustrip_id'=>$bustrip->id,'user'=>$user]);
        $buses = Bus::all();
        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();

           $userCompleteRides= Booking::where(['user_id'=>Auth::user()->id,'status'=>1,'active'=>1])->first();



        return view('frontend.review.index',compact('navbar','slider','makeBook',
                                'about','contact','bustype','faq','bustrip','booking','userCompleteRides'));

    }
    public function ratingCreate(Request $request)
    {
        $bustrip = BusTrip::find($request->id);
        $rating = new Rating;

        $rating->rating = $request->rate;

        $rating->user_id = auth()->user()->id;



        $bustrip->ratings()->save($rating);

        return redirect()->route('view.booking')->with('rating','Thanks for your precious Raview');
    }
}
