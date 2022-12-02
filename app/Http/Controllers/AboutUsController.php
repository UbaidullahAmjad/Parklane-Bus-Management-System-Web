<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\About;
use App\Models\Bus;
use App\Models\busType;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\makeYourBooking;
use App\Models\Navbar;
use App\Models\Slider;
use App\Models\User;
class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $aboutuss = AboutUs::all();
        return view('admin.aboutus.index',compact('aboutuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       $created_at = Carbon::now();
       if($request->hasFile('image'))
       {
           
       
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/image/aboutus/', $image_new_name);

        $request->merge(['image'=>'storage/image/aboutus/'. $image_new_name,'created_at'=>$created_at]);
       }
         $aboutus = new AboutUs;
        $aboutus->insert($request->only($aboutus->getFillable()));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus =AboutUs::find($id);
        return view('admin.aboutus.edit',compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'img'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $created_at = Carbon::now();
        $aboutus = AboutUs::find($id);
        $aboutus->update(
            [
                'sub_title'=>$request->sub_title,
                'main_title'=>$request->main_title,
                'description'=>$request->description,
                'descover_link'=>$request->descover_link,
                ]);
        if($request->hasFile('img'))
        {
        $image_new_name = time() . $request->img->getClientOriginalName();
        $request->img->move(storage_path().'/app/public', $image_new_name);
        $aboutus->update([
            'image'=>'storage/'.$image_new_name
            ]);
        }
         
        
        return redirect()->route('abouts-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutUs::find($id)->delete();
        return back()->with('delete','Deleted Succesfully');
    }
    
    public function aboutHead()
    {
       $aboutuss = AboutUs::all();
        return view('admin.aboutus.header',compact('aboutuss'));
    }
      public function editing($id)
    {
       $aboutuss = AboutUs::find($id);
        return view('admin.aboutus.editing',compact('aboutuss'));
    }
    
    public function updating(Request $request,$id)
    {
        $request->validate([
            'img'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('img');
        $aboutus = AboutUs::find($id);
        if($request->hasFile('img'))
        {
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/image/aboutus/bgimage/', $image_new_name);
        $aboutus->bg_image = 'storage/image/aboutus/bgimage/'. $image_new_name;
        }
         
         
   
         $aboutus->update();
        return redirect()->route('abouts.abouthead');
    }
    
    public function viewUI()
    {   $aboutus = AboutUs::first();
        $sociallink = SocialLink::first();
        $buses = Bus::all();
        $navbar= Navbar::first();
        $slider = Slider::all();
        $makeBook = makeYourBooking::first();
        $about = About::all();
        $contact = Contact::all();
        $bustype =busType::all();
        $faq = Faq::where('active',1)->get();
    return view('frontend.about',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq','aboutus','sociallink'));
    }
}
