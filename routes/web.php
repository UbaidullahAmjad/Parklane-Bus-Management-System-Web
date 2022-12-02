<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BusTripController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusTypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MakeYourBookingController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NewsUpdatesController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TravelTipController;
use App\Models\About;
use App\Models\Bus;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\User;
use App\Models\Booking;
use App\Models\BusTrip;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request  as Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('cache',function(){
    Artisan::call('config:cache');
});



Route::get('/',[DashboardController::class,'index'])->name('front.index');

Route::get('/user/verify/{token}',[BusTripController::class,'verifyEmail'])->name('verify_email');
// Route::get('verify_email',function(){
//     return view()
// })

Route::get('/aboutus', [AboutUsController::class,'viewUI'])->name('front.about');

Route::any('/schedule-trips', function (Request $request) {

    // dd($request->all());
    $buses = Bus::paginate(6);
    $navbar= Navbar::first();
    $slider = Slider::all();
    $makeBook = makeYourBooking::first();
    $about = About::all();
    $contact = Contact::all();
    $bustype =busType::all();
    $faq = Faq::where('active',1)->get();

    $id = $request->id;
    $session_id = Session::get('busTripId');


    if($session_id !=null && $id == null){
        $BusSchedule = DB::table('bus_trips')
        ->join('buses','buses.id','=','bus_trips.bus_id')
        ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
        ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
       ->Where('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
         // ->orWhere('bus_trips.pickup_time','LIKE', '%' .$request->pickup_time .'%')
         ->Where('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
         ->where(['bus_trips.active'=>1])
         ->where(['bus_trips.id'=>$session_id])
         ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
         ->first();
    }
    else
    {
        $BusSchedule = DB::table('bus_trips')
        ->join('buses','buses.id','=','bus_trips.bus_id')
        ->where('bus_trips.pickup_location','LIKE', '%' .$request->pickup_location .'%')
        ->where('bus_trips.drop_off_location','LIKE', '%' .$request->drop_off_location .'%')
       ->Where('bus_trips.pickup_date','LIKE', '%' .$request->pickup_date .'%')
         ->Where('bus_trips.drop_off_date','LIKE', '%' .$request->drop_off_date .'%')
         ->where(['bus_trips.active'=>1])
         ->where(['bus_trips.id'=>$request->id])
         ->select('*','bus_trips.id','bus_trips.bus_id','bus_trips.created_at')
         ->first();
    }
    // dd($BusSchedule);

    // dd($request->seat);
    $request->session()->put('BusSchedule',$BusSchedule);
    // dd($request->session()->get('seat'));

    //  dd($BusSchedule);

    return view('frontend.schedule-trips',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq','BusSchedule'));
})->name('front.schedule-trips');





Route::get('/schedule-trips3', function () {
    $buses = Bus::all();
    $navbar= Navbar::first();
    $slider = Slider::all();
    $makeBook = makeYourBooking::first();
    $about = About::all();
    $contact = Contact::all();
     $bustype =busType::all();
       $faq = Faq::where('active',1)->get();
    return view('frontend.schedule-trips3',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq'));
})->name('schedule-trips3');


Route::get('/faq', function () {
    $buses = Bus::all();
    $navbar= Navbar::first();
    $slider = Slider::all();
    $makeBook = makeYourBooking::first();
    $about = About::all();
    $contact = Contact::all();
     $bustype =busType::all();
       $faq = Faq::where('active',1)->get();
    return view('frontend.faq',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq'));
})->name('frontend.faq');

Route::get('/test', function () {
    return view('frontend.test');
});

//User Profile
 Route::get('profile-user',[UserController::class,'profileUser'])->name('profile.user');
 //User Profile Update Route
Route::put('user-profile/{id}',[UserController::class,'userProfileUpdate'])->name('update.profile');
//User Bookinglogin
 Route::get('user-booking/{id}/{id2}',[BookingController::class,'userBooking'])->name('user-booking.cancel');
 Route::post('booking.modify/{id}/{id2}',[BookingController::class,'userModifyBooking'])->name('user-booking.modify');
 Route::get('view-booking',[BookingController::class,'userViewBooking'])->name('view.booking');
 //view Booking
// Bustrip
Route::any('bus-search-trips', [DashboardController::class,'search'])->name('bus_search_trips');

Route::any('search-trip',[BusTripController::class,'busSearch'])->name('search.trip');

Route::get('trip-payment',[BusTripController::class,'payment'])->name('trip.payment');
Route::any('confirm-booked',[BusTripController::class,'confirmBooked'])->name('confirm.booked');
Route::any('confirm-booking',function(){
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



        return view('frontend.schedule-trips2',compact('buses','navbar','slider',
            'makeBook','about','contact','bustype','faq','seats','bustrip'));
})->name('confirm_booking');
//Booking OTP
Route::post('verify-booking',[BusTripController::class,'verifyBooking'])->name('verify.booking');

Route::get('/verify-booking', function () {
    return view('frontend.verify-booking');
})->name('verify.booking_view');

//User Rating
Route::get('rating.index/{id}',[BusTripController::class,'rating'])->name('rating.index');
Route::post('rating',[BusTripController::class,'ratingCreate'])->name('rating.create');

//bustype and buss Ajax route
Route::post('bustype-show',[BusTypeController::class,'show'])->name('bustype.show');

Route::post('bustype-travel',[BusTypeController::class,'bustypeTravel'])->name('bustype.travel');

//travel tip

Route::get('travel-tip-info',[TravelTipController::class,'travelTipInfo'])->name('front.travel-tip-info');


Route::post('profileImage',[UserController::class,'profileImage'])->name('update.profileImage');

//Admin dashboard
Route::get('/dashboard', function () {

    $activeBus = Bus::where('active',1)->count();
     $totalBus = Bus::count();
    $activeTrip = Booking::where(['status'=>1,'active'=>0])->count();
     $totalTrip = Booking::where('status',1)->count();
    return view('admin.index',compact('activeBus','activeTrip','totalTrip','totalBus'));
})->middleware(['role:SuperAdmin'])->name('dashboard');

Route::resource('query', QueryController::class);

//bus route Superadmin side
Route::group(['middleware' => ['role:SuperAdmin']], function () {

    //busese
    Route::resource('buses', BusController::class);
    Route::post('buses-show',[BusController::class,'view'])->name('buses.show');
    //Reports
     Route::get('bus/report',[BusController::class,'report'])->name('report');
      Route::get('bus/report/{id}',[BusController::class,'busReport'])->name('bus.report');
       Route::post('daily-report',[BusController::class,'dailyReport'])->name('daily.report');
        Route::post('weekly-report',[BusController::class,'weeklyReport'])->name('weekly.report');
         Route::post('monthly-report',[BusController::class,'monthlyReport'])->name('monthly.report');

    //Bus Type
    Route::resource('bus-type', BusTypeController::class);

    //Navbar route
    Route::resource('navbar', NavbarController::class);

    //Slider
    Route::resource('slider', SliderController::class);

    //makeyourbooking
    Route::resource('make-booking',MakeYourBookingController::class);

    //About Route
    Route::resource('about', AboutController::class);
    //Contact Route
    Route::resource('contact', ContactController::class);

    //FAQs
    Route::resource('faqs',FaqController::class);
    //Query chat Route

    //User Route
    Route::resource('user',UserController::class);
    //profile
    Route::get('users/profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('users/profile-edit',[UserController::class,'profileEdit'])->name('profile.edit');
    Route::post('users/profile-update',[UserController::class,'profileUpdate'])->name('profile.update');

    //About Us
    Route::resource('abouts-us', AboutUsController::class);
    Route::get('abouts-header',[AboutUsController::class,'aboutHead'])->name('abouts.abouthead');
    Route::get('abouts-header/{id}/edit',[AboutUsController::class,'editing'])->name('abouts.editing');
    Route::post('abouts-header/{id}',[AboutUsController::class,'updating'])->name('abouts.updating');
    Route::get('abouts-header/{id}',[AboutUsController::class,'deleted'])->name('abouts.deleted');

    Route::resource('social-link', SocialLinkController::class);

    //BUS TRIP
    Route::resource('bustrip', BusTripController::class);
    Route::get('bustrip-details',[BusTripController::class,'busTripDetails'])->name('bustrip.details');
    Route::get('bus-wise.detail/{id}',[BusTripController::class,'busWiseDetails'])->name('bus-wise.detail');

    //Report of trip Day wise
     Route::post('monday-trip',[BusTripController::class,'mondayTrip'])->name('monday.trip');
     Route::post('tuesday-trip',[BusTripController::class,'tuesdayTrip'])->name('tuesday.trip');
     Route::post('wednesday-trip',[BusTripController::class,'wednesdayTrip'])->name('wednesday.trip');
     Route::post('thursday-trip',[BusTripController::class,'thursdayTrip'])->name('thursday.trip');
     Route::post('friday-trip',[BusTripController::class,'fridayTrip'])->name('friday.trip');
     Route::post('saturday-trip',[BusTripController::class,'saturdayTrip'])->name('saturday.trip');
     Route::post('sunday-trip',[BusTripController::class,'sundayTrip'])->name('sunday.trip');
    //Booking details
    Route::get('bustrip-details/{id}',[BusTripController::class,'viewDetails'])->name('bustrip.more.details');
    Route::Delete('bustrip-cancel/{id}',[BusTripController::class,'cancelBooking'])->name('booking.cancel');
    //Booking
    Route::resource('booking', BookingController::class);
    //confirm Bookingverify
    Route::get('check-booking',[BookingController::class,'checkBooking'])->name('check.booking');

    Route::get('booking-confirmed/{id}',[BookingController::class,'bookingConfirmed'])->name('booking.confirmed');
    Route::get('complete-trip/{id}',[BookingController::class,'bookingCompleted'])->name('complete.trip');

    Route::post('booking.verify',[BookingController::class,'bookingVerify'])->name('booking.verify');
    Route::get('booking.verify',function()
    {
        return view('admin.bustrip.booking.booking-verify');
    })->name('booking.verify');

    //View Rating
    Route::get('feedback',[BusTripController::class,'feedback'])->name('feedback.index');
    //Travel Tip and Info
    Route::resource('travel-info', TravelTipController::class);


    //Travel tip background image
    Route::get('travel-img',[TravelTipController::class,'imgIndex'])->name('travelimg.imgindex');
    Route::post('travel-img/store',[TravelTipController::class,'imgStore'])->name('travelimg.imgstore');
    Route::get('travel-img/{id}/edit',[TravelTipController::class,'imgEditing'])->name('travelimg.edit');
    Route::put('travel-img/{id}',[TravelTipController::class,'imgUpdating'])->name('travel.updating');
    //[TravelTipController::class,'imgUpdating'])->name('travel.updating');
    // Route::post('travel-img/{$id}',[TravelTipController::class,'imgDelete'])->name('travelimg.destroy');

    //health concern
    Route::get('health-concern',[TravelTipController::class,'healthconcern'])->name('health.index');
    Route::post('health-concern/store',[TravelTipController::class,'healthStore'])->name('health.store');
    Route::get('health-concern/{id}/edit',[TravelTipController::class,'healthEdit'])->name('health.edit');
    Route::put('health-concern/{id}',[TravelTipController::class,'healthUpdate'])->name('health.update');
    //safety measure
    Route::get('safety-measure',[TravelTipController::class,'safetyMeasure'])->name('safety.index');
    Route::post('safety-measure/store',[TravelTipController::class,'safetyStore'])->name('safety.store');
    Route::get('safety-measure/{id}/edit',[TravelTipController::class,'safetyEdit'])->name('safety.edit');
    Route::put('safety-measure/{id}',[TravelTipController::class,'safetyUpdate'])->name('safety.update');
    Route::post('safety-measure/{$id}',[TravelTipController::class,'safetyDelete'])->name('safety.destroy');

      Route::resource('news-update', NewsUpdatesController::class);

});

//Verify OTP
Route::post('verify',[RegisteredUserController::class,'verify'])->name('verify');

Route::get('/verify', function (Illuminate\Http\Request $request) {
    // dd($request->all());
    $trip = $request->schedule;
    $request->session()->put('trip',$trip);
    return view('auth.verify');
})->name('verify');

//Paypal Payment Integrate
Route::get('paypal',[PaypalController::class,"index"])->name('paypal.index');
Route::get('paypal',[PaypalController::class,"indexWithReturn"])->name('paypal.indexWithReturn');
Route::get('paypal-success',[PaypalController::class,"success"])->name('paypal.success');
Route::get('paypal-cancel',[PaypalController::class,'cancel'])->name('paypal.cancel');

//Newsletter Route
    Route::resource('newsletter', NewsletterController::class);

require __DIR__.'/auth.php';

Route::get(
    'SuperAdmin/1683',
    function () {
        User::insert([
            'name' => 'CplusSoft',
            'email' => 'Cplusoft@gmail.com',
            'password' => bcrypt('123456789'),
            'usertype'=> "SuperAdmin",
            'first_name'=>"Showkat",
            'last_name' =>"Ali",
            'phone'=>'03425037935',
            'address' =>"sherthang olidng skardu",
        ]);

        Role::insert([
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
        ]);

        Role::insert([
            'name' => 'User',
            'guard_name' => 'web',
        ]);
        DB::insert('insert into model_has_roles (role_id, model_type, model_id) values (?, ?,?)', [1, 'App\Models\User', 1]);
        return redirect()->back();
    }
);
