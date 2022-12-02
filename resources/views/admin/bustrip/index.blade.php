
@extends('admin.partials.master')
@section('content')

	<div class="app-content">
        <div class="side-app">
            <div class="page-header">
                <h4 class="page-title"> Bus Trips</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Bus Trips</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Bus Trips</li>
                </ol>
            </div>
            <!--/Page-Header-->

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">BusTrip</div>
                            <div class="col-md-10 text-right">
                                <!--Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

		@if(Session::has('message'))
		<p class="alert alert-success">{{ Session::get('message') }}</p>
        @elseif (Session::has('update'))
        <p class="alert alert-info">{{ Session::get('update') }}</p>
        @else

		@endif

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bus Name</th>
                                            <th>Pick Up</th>
                                            <th>Drop Off</th>
                                            <th>Pickup Date </th>
                                            <th>Pickup Time</th>
                                            <th>Drop off Date</th>
                                            <th>Drop off Time</th>



                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($bustrip as $bustri )
                                         <tr>
                                             <td>{{$loop->index+1}}</td>
                                             <td>{{$bustri->bus->name}}</td>
                                             <td>{{$bustri->pickup_location }}</td>
                                             <td>{{$bustri->drop_off_location}}</td>
                                             <td>{{$bustri->pickup_date}}</td>
                                              <td>{{$bustri->pickup_time}}</td>
                                             <td>{{$bustri->drop_off_date}}</td>
                                              <td>{{$bustri->drop_off_time}}</td>




                                                <td style=" display: inline-flex">
                                                    {{-- <a href="{{route('bustrip.show',$bustri->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a> --}}
                                                     <a href="{{route('bustrip.edit',$bustri->id)}}" style="margin: 2px;" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>

                                                   <form action="{{route('bustrip.destroy',$bustri->id)}}" method="POST">
                                                      @csrf
                                                      @method('DELETE')

                                                      <button type="submit"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                                   </form>
                                                </td>
                                         </tr>
                                       @endforeach





                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- table-wrapper -->
                    </div>
                    <!-- section-wrapper -->
                </div>

            </div>
        </div>
    </div>


{{-- Add Model --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bus Trip</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{route('bustrip.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                          <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Select Bus</label>
                                        <select class="form-control" name="bus_id">
                                               @foreach ($bus as $bu )
                                                <option value="{{$bu->id}}">{{$bu->name}}</option>
                                               @endforeach
                                        </select>
                                    </div>
                                </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">PickUp Location</label>
                                <input type="text" class="form-control @error('pickup_location')
                                is-invalid
                                @enderror" id="pickup_location" name="pickup_location" placeholder="Pickup Location">
                                @error('pickup_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Drop Off Location</label>
                                <input type="text" class="form-control @error('drop_off_location')
                                 is-invalid
                                @enderror" id="Drop Off Location" name="drop_off_location" placeholder="Drop Off Date">
                                @error('drop_off_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1"> Pickup Day</label>
                                <input type="date" class="form-control @error('pickup_date')
                                is-invalid
                                @enderror" id="pickup_date" name="pickup_date" placeholder="pickup_date">
                                @error('pickup_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Drop Day</label>

                                <input type="date" class="form-control @error('drop_off_date')
                                is-invalid
                               @enderror" id="drop_off_date" name="drop_off_date" placeholder="Drop Off Date">
                               @error('drop_off_date')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                               @enderror

                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Pickup Time</label>
                                <input type="time" class="form-control @error('pickup_time')
                                is-invalid
                                @enderror" id="pickup_time" name="pickup_time" placeholder="pickup_time">
                                @error('pickup_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                         
                         <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Drop Off Time</label>
                                <input type="time" class="form-control @error('drop_off_time')
                                 is-invalid
                                @enderror" id="drop_off_time" name="drop_off_time" placeholder="Drop Off Date">
                                @error('drop_off_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                </form>
            </div>
        </div>

      </div>
    </div>
  </div>


@endsection
