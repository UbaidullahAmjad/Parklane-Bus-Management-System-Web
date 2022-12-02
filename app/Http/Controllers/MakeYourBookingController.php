<?php

namespace App\Http\Controllers;

use App\Models\makeYourBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MakeYourBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeYourBooking = makeYourBooking::all();
        return view('admin.makeyourbooking.index',compact('makeYourBooking'));
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
        $request->merge(['created_at'=> $created_at]);
        $makeYourBooking =new makeYourBooking();
        $makeYourBooking->insert($request->only($makeYourBooking->getFillable()));

        return redirect()->route('make-booking.index')->with('status','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\makeYourBooking  $makeYourBooking
     * @return \Illuminate\Http\Response
     */
    public function show(makeYourBooking $makeYourBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\makeYourBooking  $makeYourBooking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $makebook =makeYourBooking::find($id);

        return view('admin.makeyourbooking.edit',compact('makebook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\makeYourBooking  $makeYourBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $created_at = Carbon::now();
        $request->merge(['created_at'=> $created_at]);
        $makeYourBooking =makeYourBooking::find($id);
        $makeYourBooking->update($request->only($makeYourBooking->getFillable()));

        return redirect()->route('make-booking.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\makeYourBooking  $makeYourBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      makeYourBooking::find($id)->delete();
      return back();
    }
}
