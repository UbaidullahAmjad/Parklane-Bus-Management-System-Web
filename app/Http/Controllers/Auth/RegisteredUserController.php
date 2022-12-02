<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GbHi8bXhDyMP2m1NDUSiYmznAJdJzX36DD;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Twilio\Rest\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try{
         $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => ['required', 'numeric', 'unique:users','regex:/^[3][0-9]{9}$/'],
            'password' => 'required|confirmed|min:8',
            'confirmation'=>'required',
        ]);

        $data = '+92'. $request->phone;
        // dd($data);
            $token = "e68bffd17298feff6c1c63d1fcbec3dd";
        $twilio_sid = "ACfdc5c66d074147bbee544b0fe7e5bbe6";
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        // dd($data['phone']);
        $twilio->verify->v2->services("VAa1bb52f3b32cdfedcdb8c4aad14ebc0f")
            ->verifications
            ->create($data, "sms");
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
        //  dd($user->usertype);
          if($user->usertype == "SuperAdmin")
          {
            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
         }
         else
         {
            return redirect()->route('verify')->with(['phone' => $request->phone,'code'=>$request->code,'data'=>$data]);
            //  return redirect()->route('front.index');
         }
        }
        catch(Exception $e){
            return back()->with('message','Username Or phone Number already exists');
        }
    }

    protected function verify(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
            'data' => ['required', 'string'],
        ]);

        // dd($data);

        /* Get credentials from .env */
           $token = "e68bffd17298feff6c1c63d1fcbec3dd";
        $twilio_sid = "ACfdc5c66d074147bbee544b0fe7e5bbe6";
        // $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);

        $verification = $twilio->verify->v2->services("VAa1bb52f3b32cdfedcdb8c4aad14ebc0f")
                                            ->verificationChecks
                                            ->create($request->verification_code, // code
                                                    ["to" =>$data['data']]
                                            );
        // $verification = $twilio->verify->v2->services("VA04b04413075a7d6e8ee6853b920ba268")
        //     ->verificationChecks
        //     ->create($data['verification_code'], array('to' => $data['phone']));
        // dd($verification);
        if ($verification->valid) {
            $user = tap(User::where('phone', $data['phone']))->update(['isVerified' => true]);
            /* Authenticate user */
            Auth::login($user->first());
            if(Auth::user()->isVerified == 1 && Auth::user()->usertype == "User")
            {

             //    dump($pickup_loc);
             //    dump($dropoff_loc);
             //    dump($seat);
             //    dd($bus_id);
             // dd($request->session()->get('BusSchedule'));

             // // $request->Session()->keep(['seat']);

             // $busSchedule = $request->session()->get('BusSchedule');
             $bustrip = $request->session()->get('bustrip');

             if($bustrip != null)
             {
                 // return redirect('search-trip?buss_id='.$busSchedule->id.'#bus_reservation_process');

                 // dd($bustrip);
                 // return redirect('bus-search-trips?busTripId='.$bustrip->id.'#bus_reservation_process');
                 // $slider = Slider::all();
                 // $navbar= Navbar::first();
                 // $makeBook = makeYourBooking::first();
                 // $about = About::all();
                 // $contact = Contact::all();
                 // $bustype =busType::all();
                 // $faq = Faq::where('active',1)->get();
                 // $seats = $request->seat;

                 return redirect('bus-search-trips');
                 // return redirect()->route('front.index');

             }
             else{
                 return redirect()->route('front.index');
             }
            // return redirect()->route('front.index')->with(['message' => 'Phone number verified']);
        }
        }
        return back()->with(['phone' => $data['phone'], 'error' => 'Invalid verification code entered!']);
    }
}
