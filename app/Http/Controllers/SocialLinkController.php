<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Carbon\Carbon;
class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sociallink = SocialLink::all();
       return view('admin.sociallink.index',compact('sociallink'));
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
        $faq =new SocialLink();
        $faq->insert($request->only($faq->getFillable()));

        return redirect()->route('social-link.index')->with('status','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $sociallink = SocialLink::find($id);
        return view('admin.sociallink.show',compact('sociallink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sociallink = SocialLink::find($id);
        return view('admin.sociallink.edit',compact('sociallink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $created_at = Carbon::now();
        $request->merge(['created_at'=> $created_at]);
        $faq =SocialLink::find($id);
        $faq->update($request->only($faq->getFillable()));

        return redirect()->route('social-link.index')->with('status','Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocailLink::find($id)->delete();
        return back();
    }
}
