
@extends('admin.partials.master')

@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Bus Management</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bus Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bus Management</li>
            </ol>
        </div>


        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Edit Buses</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bustrip.update',$bustrip->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <hr>

                             <h4>Bus Trip Details</h4>

                            <div class="form-row">
                                  <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Select Bus</label>
                                                <select class="form-control" name="bus_id">
                                                       @foreach ($bus as $bu )
                                                        <option value="{{$bu->id}}" {{ $bu->id == $bustrip->bus_id ? 'selected' : '' }}>{{$bu->name}}</option>
                                                       @endforeach
                                                </select>
                                            </div>
                                        </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">PickUp Location</label>
                                        {{-- <select class="form-control dynamic" id="pickuplocation" name="pickup_location" data-dependent="pickuplocation"
                                           onchange="Dynamic()">
                                            <option>select pick up location ..........</option>
                                            @foreach ($bustrip as $bustri)
                                              <option value="{{$bustri->pickup_location}}">{{$bustri->pickup_location}}</option>
                                             @endforeach
                                        </select> --}}
                                        <input type="text" class="form-control" id="pickup_lopickup_locationcation" name="pickup_location" placeholder="pickup_location" value="{{$bustrip->pickup_location}}" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Location</label>
                                        <input type="text" class="form-control" id="drop_off_location" name="drop_off_location" placeholder="drop_off_location" value="{{$bustrip->drop_off_location}}" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1"> Pickup Day</label>
                                        <input type="date" class="form-control" id="pickup_date" name="pickup_date" placeholder="pickup_date" value="{{$bustrip->pickup_date}}" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Pickup Time</label>
                                        <input type="time" class="form-control" id="pickup_time" name="pickup_time" placeholder="pickup_time" value="{{$bustrip->pickup_time}}" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Day</label>
                                        <input type="date" class="form-control" id="drop_off_date" name="drop_off_date" placeholder="drop_off_date" value="{{$bustrip->drop_off_date}}"  required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Time</label>
                                        <input type="time" class="form-control" id="drop_off_time" name="drop_off_time" placeholder="drop_off_time" value="{{$bustrip->drop_off_time}}"  required>
                                    </div>
                                </div>



                            </div>

                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
