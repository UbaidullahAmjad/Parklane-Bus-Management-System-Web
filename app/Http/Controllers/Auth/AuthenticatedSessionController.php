<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\About;
use App\Models\Bus;
use App\Models\BusTrip;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);
        $request->authenticate();

        // dd($request->all());
       


        $request->session()->regenerate();
        // dd(Session::get('seat'));
        //dd(Auth::user()->isVerified);
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
            // return redirect()->back();
            // return redirect()->back();
           }
           elseif(Auth::user()->usertype == "SuperAdmin")
           {
               return redirect()->intended(RouteServiceProvider::HOME);
           }
           else{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('front.index');
                              }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.index');
    }
}
