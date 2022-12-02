<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbar = Navbar::all();
        return view('admin.navbar.index',compact('navbar'));
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
           'name' => 'required',
           'logo' => 'required'
        ]);
        $created_at = Carbon::now();

        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/image/logo/', $image_new_name);

        $request->merge(['image'=>'storage/image/logo/'. $image_new_name,'created_at'=>$created_at]);
        $navbar =new Navbar();
        $navbar->insert($request->only($navbar->getFillable()));

        return redirect()->route('navbar.index')->with('status','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nav = Navbar::find($id);
        return view('admin.navbar.view',compact('nav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $navbar =Navbar::find($id);
      return view('admin.navbar.edit',compact('navbar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',

         ]);
        $created_at = Carbon::now();

        if($request->hasFile('img'))
        {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/image/logo/', $image_new_name);
        $request->merge(['image'=>'storage/image/logo/'. $image_new_name,'created_at'=>$created_at]);

        }

        $navbar = Navbar::find($id);
        $navbar->update($request->only($navbar->getFillable()));
        return redirect()->route('navbar.index')->with('status','Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Navbar::where('id',$id)->delete();
        return back()->with('delete','Deleted Successfully');
    }
}
