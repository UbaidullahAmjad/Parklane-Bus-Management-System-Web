<?php

namespace App\Http\Controllers;

use App\Models\NewsUpdates;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsUpdate = NewsUpdates::all();

        return view('admin.newsupdate.index',compact('newsUpdate'));
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
            'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         $created_at = Carbon::now();

         $image = $request->file('img');
         $image_new_name = time() . $image->getClientOriginalName();
         $image->move('storage/newsupdate/image/', $image_new_name);

         $request->merge(['image'=>'storage/newsupdate/image/'. $image_new_name,'created_at'=>$created_at]);
         $newsUpdate =new NewsUpdates();
         $newsUpdate->insert($request->only($newsUpdate->getFillable()));
         return back()->with('status','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsUpdates  $newsUpdates
     * @return \Illuminate\Http\Response
     */
    public function show(NewsUpdates $newsUpdates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsUpdates  $newsUpdates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsUpdate = NewsUpdates::find($id);
        return view('admin.newsupdate.edit',compact('newsUpdate'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsUpdates  $newsUpdates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'img'   => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $created_at = Carbon::now();

        $image = $request->file('img');
        if($image){
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/newsupdate/image/', $image_new_name);

        $request->merge(['image'=>'storage/newsupdate/image/'. $image_new_name,'created_at'=>$created_at]);
        }
        $newsUpdate = NewsUpdates::find($id);
        $newsUpdate->update($request->only($newsUpdate->getFillable()));
        return redirect()->route('news-update.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsUpdates  $newsUpdates
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsUpdates $newsUpdates)
    {
        //
    }
}
