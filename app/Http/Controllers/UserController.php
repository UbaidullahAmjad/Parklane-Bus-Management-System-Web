<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\BusTrip;
use App\Models\User;
use App\Models\busType;
use willvincent\Rateable\Rating;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('userType','=','User')->get();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
       return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $created_at = Carbon::now();

        $request->merge(['password'=>bcrypt($request->password),'created_at'=>$created_at]);

        $user = User::find($id);

        $user->update($request->only($user->getFillable()));
        return redirect()->route('user.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rating::where('user_id',$id)->delete();
       User::where(['usertype' => 'User' ,'id'=>$id])->delete();
       return back();
    }

    public function profile()
    {
        $buses = Bus::paginate(6);
    $navbar= Navbar::first();
    $slider = Slider::all();
    $makeBook = makeYourBooking::first();
    $about = About::all();
    $contact = Contact::all();
    $bustype =busType::all();
    $faq = Faq::where('active',1)->get();
        $editProfile = User::find(Auth::id());
        // dd($editProfile);
        return view('admin.user.profile',compact('editProfile','buses','navbar','slider','makeBook','about','contact','bustype','faq'));
    }

    public function profileEdit()
    {
       $editProfile = User::where('id',Auth::user()->id)->first();

       return view('admin.user.profile',compact('editProfile'));
    }
   public function profileUpdate(Request $request)
   {

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => ['required', 'numeric'],

    ]);
         $user = User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
         ]);

   }

   // front end User Profiel

   public function profileUser()
   {
        if(Auth::check())
        {
            $user = User::find(Auth::id());
            $buses = Bus::paginate(6);
            $navbar= Navbar::first();
            $slider = Slider::all();
            $makeBook = makeYourBooking::first();
            $about = About::all();
            $contact = Contact::all();
            $bustype =busType::all();
            $faq = Faq::where('active',1)->get();
            //         $buses = Bus::all();
            //         $navbar= Navbar::first();
            //         $slider = Slider::all();
            //         $makeBook = makeYourBooking::first();
            //         $about = About::all();
            //         $contact = Contact::all();
            //         $bustype =busType::all();
            //         $faq = Faq::where('active',1)->get();
            //         $booking = DB::table('bookings')
            //                   ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
            //                   ->join('users','users.id','=','bookings.user_id')
            //                   ->where('users.id',$user->id)
            //                   ->where('bookings.status',1)
            //                   ->where('bookings.active',0)
            //                   ->select('*','bookings.id')
            //                   ->first();
            //                   $userCompleteRides= Booking::where(['user_id'=>Auth::user()->id,'status'=>1,'active'=>1])->first();
            // // dd($userCompleteRides->bustrip_id);
            //         return view('frontend.profile.index',compact('buses','navbar','slider','makeBook','about','contact'
            //          ,'bustype','faq','user','booking','userCompleteRides'));
            //return redirect()->back()->with('message','user','buses','navbar','slider','makeBook','about','contact','bustype','faq');
            return view('frontend.profile.index',compact('user','buses','navbar','slider','makeBook','about','contact','bustype','faq'));
        }
        else {
            return redirect()->back()->with('error','Please login first');
        }
    }


   public function userProfileUpdate(Request $request,$id)
   {
    // dd("HERE");
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => ['required', 'numeric'],


        ]);




         $user = User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,

            'state'  =>$request->state,
            'dob'   => $request->dob,
            'city' => $request->city,
         ]);

         return back()->with('message','successfull update');

   }

   public function profileImage(Request $request)
   {

        //  dd($request);
        if($request->hasFile('avatar'))
        {
        $image = $request->file('avatar');
        $path = time() . $image->getClientOriginalName();
        $image->move('storage/image/profile/', $path);

        }

       $user = User::where('id',Auth::user()->id)->first();
       $user->avatar = 'storage/image/profile/'. $path;
       $user->update();
       return back()->with('message','Successfully Update');
   }



}
