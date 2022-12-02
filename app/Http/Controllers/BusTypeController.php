<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\busType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bustype = busType::all();
        return view('admin.bustype.index',compact('bustype'));
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
        $bustype =new busType();
        $bustype->insert($request->only($bustype->getFillable()));

        return redirect()->route('bus-type.index')->with('status','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\busType  $busType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $buses = Bus::where('busType_id',$request->id)->get();
        // dd(url("schedule-trips"));
        $url = url("schedule-trips");
         $temp = null;
         foreach($buses as $bus)
         {
             $temp .='
             <div class="col-md-4">
                 <div class="choose-bus-box">
                     <div class="img-holder">
                         <img src='.asset($bus->image).' width="100%" height="200px" alt="image">
                     </div>
                     <h4>'.$bus->name.'</h4>
                     <div class="bus-info">
                         <h4>Base Rate:</h4>
                         <h4>$'.$bus->base_rate.'</h4>
                     </div>

                     <div class="bus-info">
                         <h4>no of seatS:</h4>
                         <h4>'.$bus->no_of_seat.'</h4>
                     </div>
                     <button class="form-control" data-toggle="modal" data-target="#myModal1'.$bus->id.'">View Trips</button>
                 </div>
             </div>
                <div class="modal fade" id="myModal1'.$bus->id.'" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header"  style="display: inline">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Bus Trips</h4>
                            </div>
                            <div class="modal-body" style="overflow-y: auto">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Pick-Up Date</th>
                                                <th>Drop-Off Date</th>
                                                <th>Pick-Up Time</th>
                                                <th>Drop-Off Time</th>
                                                <th>Seats Available</th>
                                                <th>Book Now</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ';
                                        foreach ($bus->bustrip as $trip_detail){
                                                if($bus->id == $trip_detail->bus_id
                                                && $trip_detail->pickup_date <= \Carbon\Carbon::now()->addDays(7)
                                                && $trip_detail->drop_off_date <= \Carbon\Carbon::now()->addDays(7)){
                                                    $temp.='<tr>
                                                    <td>'.csrf_field().'

                                                                <input type="hidden" name="pickup_location"
                                                                value="'.$trip_detail->pickup_location.'">
                                                                '.$trip_detail->pickup_location.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="drop_off_location" value="'.$trip_detail->drop_off_location.'">
                                                            '.$trip_detail->drop_off_location.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="pickup_date" value="'.$trip_detail->pickup_date.'">
                                                            '.$trip_detail->pickup_date.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="drop_off_date" value="'.$trip_detail->drop_off_date.'">
                                                            '.$trip_detail->drop_off_date.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="pickup_time" value="'.$trip_detail->pickup_time.'">
                                                            '.$trip_detail->pickup_time.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="drop_off_time" value="'.$trip_detail->drop_off_time.'">
                                                            '.$trip_detail->drop_off_time.'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="left_seat" value="'.$trip_detail->left_seat.'">
                                                            '.$trip_detail->left_seat.'
                                                        </td>


                                                        <td>
                                                        <input type="hidden" name="id" value="'.$trip_detail->id.'" >
                                                        <input type="hidden" name="bus_id" value="'.$trip_detail->bus_id.'">';
                                                            if($trip_detail->left_seat <= 0) {
                                                                $temp.= '<a href="/schedule-trips#bus_info_form" class="btn btn-primary" value="Book Now" disabled>Book Now </a>';
                                                            }
                                                            else
                                                            {
                                                                $temp.='<a href="/schedule-trips?pickup_location='.$trip_detail->pickup_location.'&drop_off_location='.$trip_detail->drop_off_location.'&pickup_date='.$trip_detail->pickup_date.'&drop_off_date='.$trip_detail->drop_off_date.'&pickup_time='.$trip_detail->pickup_time.'&drop_off_time='.$trip_detail->drop_off_time.'&left_seat='.$trip_detail->left_seat.'&id='.$trip_detail->id.'#bus_info_form" class="btn btn-primary" id="bus_trip_button" value="Book Now">Book Now</a>';
                                                            }
                                                        $temp.='
                                                        </td></tr>';
                                                }
                                                }
                                                    $temp.='

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
             ';
         }

        //  dd($temp);

         return response()->json($temp);
//  <div class="bus-info">
//                         <h4>Per Mile/KM:</h4>
//                         <h4>'.$bu->per_mile_rate.'</h4>
//                     </div>

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\busType  $busType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bustype = busType::find($id);
        return view('admin.bustype.edit',compact('bustype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\busType  $busType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $created_at = Carbon::now();

        $request->merge(['created_at'=>$created_at]);
        $bustype =busType::find($id);
        $bustype->update($request->only($bustype->getFillable()));

        return redirect()->route('bus-type.index')->with('status','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\busType  $busType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Bus::where('busType_id',$id)->delete();
       busType::find($id)->delete();
       return back();
    }


     public function bustypeTravel(Request $request)
    {

        $bus = Bus::where('busType_id',$request->bustype_id)->get();
    //   dd($bus);
         $temp = null;
         foreach($bus as $bu)
         {
             $temp .='<div class="col-md-4">
					<div class="choose-bus-box">
						<div class="img-holder">
							<img src="'.asset($bu->image).'" width="100%" height="200px" alt="image">
						</div>
						<h4>'.$bu->name.'</h4>
						<div class="bus-info">
							<h4>Base Rate:</h4>
							<h4>$ '.$bu->base_rate.'</h4>
						</div>
						<div class="bus-info">
							<h4>Per Mile/KM:</h4>
							<h4>$'.$bu->per_mile_rate.'</h4>
						</div>
						<div class="bus-info">
							<h4>NO of seats:</h4>
							<h4>'.$bu->no_of_seat.'</h4>
						</div>
						<a href="'.route('front.schedule-trips').'">BOOK BUS</a>
					</div>
				</div>';



         }

         return response()->json($temp);


    }
}
