<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = Newsletter::all();
        return view('admin.newsletter.index',compact('newsletter'));
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
        $newsletter =new Newsletter();
        $newsletter->insert($request->only($newsletter->getFillable()));

        return back()->with('message','Newsletter Successfully Subscribed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = Newsletter::find($id);
        return view('admin.newsletter.edit',compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         
        $created_at = Carbon::now();
        $request->merge(['created_at'=> $created_at]);
        $newsletter =Newsletter::find($id);
        $newsletter->Update($request->only($newsletter->getFillable()));

        return redirect()->route('newsletter.index')->with('status','Successfully Send');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->route('newsletter.index')->with('status','Successfully Deleted');
    }
}
