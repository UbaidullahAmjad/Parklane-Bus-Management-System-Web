<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Query::all();
        return view('admin.query.index',compact('query'));
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
        if(Auth::user() == null)
        {
            return back()->with('message','Please Login To Send Message');
        }
        $created_at = Carbon::now();

        $request->merge(['created_at'=>$created_at]);
        Query::create($request->all());

        return redirect()->back()->with('status','Successfully Send');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
       $query = Query::find($id);
       return view('admin.query.edit',compact('query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $created_at = Carbon::now();

        $request->merge(['created_at'=>$created_at]);
        $query =Query::find($id);
        $query->update($request->only($query->getFillable()));

        return redirect()->route('query.index')->with('status','Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Query::find($id);
        $query->delete();
        return redirect()->route('query.index')->with('status','Successfully Delete');
    }
}
