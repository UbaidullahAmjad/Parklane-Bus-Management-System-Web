<?php

namespace App\Http\Controllers;

use App\Models\GeneralTravel;
use App\Models\HealthConcern;
use App\Models\SafetyMeasure;
use App\Models\TravelTipImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Bus;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\User;
class TravelTipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traveltip = GeneralTravel::first();
        return view('admin.traveltip.generaltravel.index',compact('traveltip'));
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
        $created_at = Carbon::now();
        $request->merge(['created_at'=>$created_at]);
        $generaltravel = new GeneralTravel;
        $generaltravel->insert($request->only($generaltravel->getFillable()));
        return back()->with('status','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generaltravel = GeneralTravel::find($id);
        return view('admin.traveltip.generaltravel.show',compact('generaltravel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $generaltravel = GeneralTravel::find($id);

         return view('admin.traveltip.generaltravel.edit',compact('generaltravel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $generaltravel=  GeneralTravel::find($id);
        $generaltravel->update($request->only($generaltravel->getFillable()));
        return redirect()->route('travel-info.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         GeneralTravel::find($id)->Delete();

         return back()->with('status','Deleted');
    }

  /// background image of Travel tip and info
    public function imgIndex()
    {
       $travelimage = TravelTipImage::all();
       return view('admin.traveltip.bgimage.index',compact('travelimage'));
    }

    public function imgStore(Request $request)
    {
    //    dd($request->all());

       $request->validate([
        'title' => 'required',
        'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
    $created_at = Carbon::now();

    if($request->hasFile('img'))
    {
    $image = $request->file('img');
    $image_new_name = time() . $image->getClientOriginalName();
    $image->move('storage/traveltip/bgimage/', $image_new_name);
    $request->merge(['image'=>'storage/traveltip/bgimage/'. $image_new_name,'created_at'=>$created_at]);

    }

    $travelimage = new TravelTipImage();
    $travelimage->insert($request->only($travelimage->getFillable()));
    return redirect()->route('travelimg.imgindex')->with('status','Successfully Created');
    }

    public function imgEditing($id)
    {
        $travelimg = TravelTipImage::find($id);
        return view('admin.traveltip.bgimage.edit',compact('travelimg'));
    }

    public function imgUpdating(Request $request,$id)
    {

       $request->validate([
        'title' => 'required',
        'img'   => 'mimes:jpeg,png,jpg,gif,svg|max:2048',

     ]);
    $created_at = Carbon::now();

    if($request->hasFile('img'))
    {
    $image = $request->file('img');
    $image_new_name = time() . $image->getClientOriginalName();
    $image->move('storage/traveltip/bgimage/', $image_new_name);
    $request->merge(['image'=>'storage/traveltip/bgimage/'. $image_new_name,'created_at'=>$created_at]);

    }

    $travelimage =  TravelTipImage::find($id);
    $travelimage->update($request->only($travelimage->getFillable()));
    return redirect()->route('travelimg.imgindex')->with('status','Successfully Updated');
    }

    //Health Concerns

    public function healthconcern()
    {
        $healthconcern = HealthConcern::first();

        return view('admin.traveltip.healthconcerns.index',compact('healthconcern'));

    }
    public function healthStore(Request $request)
    {
        $created_at = Carbon::now();

    if($request->hasFile('img'))
    {
    $image = $request->file('img');
    $image_new_name = time() . $image->getClientOriginalName();
    $image->move('storage/healthconcern/image/', $image_new_name);
    $request->merge(['image'=>'storage/healthconcern/image/'. $image_new_name,'created_at'=>$created_at]);

    }

    $healthconcern = new HealthConcern;
    $healthconcern->insert($request->only($healthconcern->getFillable()));
    return back()->with('status','Successfully Added');

    }

    public function healthEdit($id)
    {
        $healthconcern =  HealthConcern::find($id);
        return view('admin.traveltip.healthconcerns.edit',compact('healthconcern'));
    }

    public function healthUpdate(Request $request,$id)
    {
        $created_at = Carbon::now();

        if($request->hasFile('img'))
        {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/healthconcern/image/', $image_new_name);
        $request->merge(['image'=>'storage/healthconcern/image/'. $image_new_name,'created_at'=>$created_at]);

        }

        $healthconcern =  HealthConcern::find($id);
        $healthconcern->update($request->only($healthconcern->getFillable()));
        return redirect()->route('health.index')->with('status','Successfully Updated');

    }

    public function safetyMeasure()
    {
        $safetMeasure = SafetyMeasure::first();
        return view('admin.traveltip.safetymeasure.index',compact('safetMeasure'));
    }

    public function safetyStore(Request $request)
    {
        $created_at = Carbon::now();
      
        if($request->hasFile('img'))
        {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/safetMeasure/image/', $image_new_name);
        $request->merge(['image'=>'storage/safetMeasure/image/'. $image_new_name,'created_at'=>$created_at]);

        }

        $safetMeasure = new SafetyMeasure;
        $safetMeasure->insert($request->only($safetMeasure->getFillable()));
        return back()->with('status','Successfully Created');
    }

    public function safetyEdit($id)
    {
        $safetMeasure = SafetyMeasure::find($id);
        return view('admin.traveltip.safetymeasure.edit',compact('safetMeasure'));
    }

    public function safetyUpdate(Request $request,$id)
    {
        $created_at = Carbon::now();
//  dd($request->hasFile('img'));
        if($request->hasFile('img'))
        {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/safetMeasure/image/', $image_new_name);
        $request->merge(['image'=>'storage/safetMeasure/image/'. $image_new_name,'created_at'=>$created_at]);

        }

        $safetMeasure =  SafetyMeasure::find($id);
        $safetMeasure->update($request->only($safetMeasure->getFillable()));
        return redirect()->route('safety.index')->with('status','Successfully Updated');
    }
    
    
    ///front end 
     public function travelTipInfo()
    {
        $buses = Bus::all();
        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();
        
         $traveltip = GeneralTravel::first();
         $healthconcern = HealthConcern::first();
         $travelimage = TravelTipImage::first();
         $safetMeasure =  SafetyMeasure::first();
          return view('frontend.travel-tip-info',compact('buses','navbar','slider',
                  'makeBook','about','contact','bustype','faq','traveltip','healthconcern','safetMeasure','travelimage'));
    }
}
