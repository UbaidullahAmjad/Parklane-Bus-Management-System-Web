<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
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
        
        $request->validate([
            'heading'=>'required',
            'heading2'=>'required',
            'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $created_at = Carbon::now();

        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/image/slider/', $image_new_name);

        //$request->merge(['image'=>'storage/image/slider/'. $image_new_name,'created_at'=>$created_at]);
        $slider =new Slider();
        $s = $slider->create($request->only($slider->getFillable()));
        $s->image = 'storage/image/slider/'. $image_new_name;
        $s->save();
        return redirect()->route('slider.index')->with('status','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $created_at = Carbon::now();

       
        $slider = Slider::find($id);
        $slider->update($request->only($slider->getFillable()));
        if($request->img){
             $image = $request->file('img');
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('storage/image/slider/', $image_new_name);
            $slider->image = 'storage/image/slider/'. $image_new_name;
            $slider->save();
            // $request->merge(['image'=>'storage/image/slider/'. $image_new_name,'created_at'=>$created_at]);
        }

        return redirect()->route('slider.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return  back();
    }
}
