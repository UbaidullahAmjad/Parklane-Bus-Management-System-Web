<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusTrip;
use App\Models\Booking;
use App\Models\busType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::where('active',1)->get();
        return view('admin.bus.index',compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bustype = busType::all();
        return view('admin.bus.create',compact('bustype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request);
        $request->validate([
          'name' => 'required',
          'no_of_seat'=>'required',
          'plate_no'=>'required',
          'base_rate' =>'required',
          
          'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        // dd($request->hasFile('img'));
        $created_at = Carbon::now();

        if($request->hasFile('img'))
    {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/bus/image/', $image_new_name);

        $request->merge(['image'=>'storage/bus/image/'. $image_new_name,'created_at'=>$created_at]);
        }
        $bus =new Bus;
        $bus->insert($request->only($bus->getFillable()));

        return redirect()->route('buses.index')->with('status','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        $buses = Bus::where('active',1)->get();
        return view('frontend.index',compact('buses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bustype = busType::all();
       $bus = Bus::where(['id'=>$id,'active'=>1])->first();

       return view('admin.bus.edit',compact('bus','bustype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'no_of_seat'=>'required',
            'plate_no'=>'required',
            'base_rate' =>'required',
      
            // 'img'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

          ]);
        $created_at = Carbon::now();
        if($request->hasFile('img'))
        {
        $image = $request->file('img');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/bus/image/', $image_new_name);

        $request->merge(['image'=>'storage/bus/image/'. $image_new_name,'created_at'=>$created_at]);
        }
        $bus = Bus::find($id);
        $bus->update($request->only($bus->getFillable()));
        return redirect()->route('buses.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::where('id',$id)->delete();
        return back()->with('delete','Successfully Deleted');
    }

     public function view(Request $request)
     {
        //   dd($request->all());

        $bus = Bus::where(['id'=>$request->bus_id,'active'=>1])->first();
        $temp = null;
        $i = 1;
        
        $bustrip = BusTrip::where(['active'=>1,'status'=>0,'bus_id'=>$bus->id])->get();
      

//   dd($count->bustrip_id);
                      
                           
          foreach($bustrip as $bus)
          {  
            //   dd($bus->id);
              $temp.='   <tr>
                        <td>'. $i++ .'</td>
                        <td>'.$bus->pickup_date.'</td>
                        <td>'.$bus->pickup_time.'</td>
                        <td>'.$bus->bus->name.'</td>
                        <td>'.$bus->pickup_location .'</td>
                        <td>'.$bus->drop_off_location.'</td>
                        <td>'.$bus->drop_off_date.'</td>
                        <td style=" display: inline-flex">
        
                        <a href="'.route('booking.confirmed',$bus->id).'" style="margin: 2px;" class="btn btn-xs btn-warning"><i class="fa fa-eye"></i></a>

                        </td>
                       

                    </tr>

          ';


          }
                
        //   dd($temp);
          return response()->json(['temp'=>$temp]);
     }


     public function report()
     {
         $buses = Bus::where('active',1)->get();
         return view('admin.reports.bustrip',compact('buses'));
     }

     public function busReport($id)
     {
         $bus = Bus::find($id);
           $count = DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->where('bus_trips.bus_id',$id)
                  ->where('bookings.status',1)
                  ->count();

            $bustrip = DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->where('bus_trips.bus_id',$id)
                  ->get();

                  return view('admin.reports.busreport',compact('bustrip','count','bus'));
     }

     public function dailyReport(Request $request)
     {
         $bus = Bus::find($request->id);
         $bustrips = BusTrip::where('bus_id',$bus->id)->first();

            $bustrip = DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereDate('bookings.created_at', Carbon::today())
                   ->where('bookings.bustrip_id', $bustrips->id)
                  ->get();

          $count =DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereDate('bookings.created_at', Carbon::today())
                  ->where('bookings.bustrip_id',$bustrips->id)
                  ->count();

                       $temp = null;
                       $i=1;

                        foreach($bustrip as $bus)
                        {
                        $temp.='   <tr>
                        <td>'. $i++ .'</td>
                        <td>'.$bus->booking_no.'</td>
                        <td>'.$bus->bustrip_id.'</td>
                        <td>'.$bus->pickup_location .'</td>
                        <td>'.$bus->drop_off_location.'</td>

                        <td>'.$bus->seat_no.'</td>
                        <td>'.$bus->name.'</td>


                        </tr>

                        ';
                 }


          return response()->json(['temp'=>$temp,'count'=>$count]);
     }

      public function weeklyReport(Request $request)
     {

         $bus = Bus::find($request->id);
         $bustrips = BusTrip::where('bus_id',$bus->id)->first();

            $bustrip = DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereBetween('bookings.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                   ->where('bookings.bustrip_id', $bustrips->id)
                  ->get();
                  $count =DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereBetween('bookings.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                  ->where('bookings.bustrip_id',$bustrips->id)
                  ->count();

                       $temp = null;
                       $i=1;

                        foreach($bustrip as $bus)
                        {
                        $temp.='   <tr>
                        <td>'. $i++ .'</td>
                        <td>'.$bus->booking_no.'</td>
                        <td>'.$bus->bustrip_id.'</td>
                        <td>'.$bus->pickup_location .'</td>
                        <td>'.$bus->drop_off_location.'</td>

                        <td>'.$bus->seat_no.'</td>
                        <td>'.$bus->name.'</td>


                        </tr>

                        ';
                 }
             return response()->json(['temp'=>$temp,'count'=>$count]);
     }
      public function monthlyReport(Request $request)
     {
        $bus = Bus::find($request->id);
         $bustrips = BusTrip::where('bus_id',$bus->id)->first();

            $bustrip = DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereMonth('bookings.created_at', date('m'))->whereYear('bookings.created_at', date('Y'))
                   ->where('bookings.bustrip_id', $bustrips->id)
                  ->get();
            $count =DB::table('bookings')
                  ->join('bus_trips','bus_trips.id','=','bookings.bustrip_id')
                  ->join('users','users.id','=','bookings.user_id')
                  ->whereMonth('bookings.created_at', date('m'))->whereYear('bookings.created_at', date('Y'))
                  ->where('bookings.bustrip_id',$bustrips->id)
                  ->count();

                       $temp = null;
                       $i=1;

                        foreach($bustrip as $bus)
                        {
                        $temp.='   <tr>
                        <td>'. $i++ .'</td>
                        <td>'.$bus->booking_no.'</td>
                        <td>'.$bus->bustrip_id.'</td>
                        <td>'.$bus->pickup_location .'</td>
                        <td>'.$bus->drop_off_location.'</td>

                        <td>'.$bus->seat_no.'</td>
                        <td>'.$bus->name.'</td>


                        </tr>

                        ';
                 }
             return response()->json(['temp'=>$temp,'count'=>$count]);
     }

}
