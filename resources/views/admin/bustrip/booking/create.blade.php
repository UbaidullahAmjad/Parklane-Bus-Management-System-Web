
@extends('admin.partials.master')

@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Booking </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Booking </a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking </li>
            </ol>
        </div>


        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title">Booking </h3>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        There were some errors with your request.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <div class="card-body">
                        <form action="{{route('booking.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <hr>
                             <h4>Personal Details</h4>
                            <input type="hidden" name="usertype" value="User">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" placeholder="Name" name="name" class="form-control" :value="old('name')" required autofocus>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" placeholder="First Name" name="first_name" class="form-control" :value="old('first_name')" required autofocus>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" name="last_name" class="form-control" :value="old('last_name')" required autofocus>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input  type="password"
                                name="password" class="form-control"
                                required autocomplete="new-password" placeholder="**********">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" class="form-control" name="email" :value="old('email')" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password"
                                name="password_confirmation" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" placeholder="Phone Number" name="phone" class="form-control" :value="old('phone')" required autofocus>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" placeholder="Address" name="address" class="form-control" :value="old('address')" required autofocus>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                             <h4>Bus Trip Details</h4>

                            <div class="form-row">
                                  <div class="form-group col-md-6">
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
                                        <label class="form-label">PickUp Location</label>
                                        {{-- <select class="form-control dynamic" id="pickuplocation" name="pickup_location" data-dependent="pickuplocation"
                                           onchange="Dynamic()">
                                            <option>select pick up location ..........</option>
                                            @foreach ($bustrip as $bustri)
                                              <option value="{{$bustri->pickup_location}}">{{$bustri->pickup_location}}</option>
                                             @endforeach
                                        </select> --}}
                                        <input type="text" class="form-control" id="pickup_location" name="pickup_location" placeholder="pickup_location" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Location</label>
                                        <input type="text" class="form-control" id="drop_off_location" name="drop_off_location" placeholder="drop_off_location" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1"> Pickup Date</label>
                                        <input type="date" class="form-control" id="pickup_date" name="pickup_date" placeholder="pickup_date" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Pickup Time</label>
                                        <input type="time" class="form-control" id="pickup_time" name="pickup_time" placeholder="pickup_time" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Date</label>
                                        <input type="date" class="form-control" id="drop_off_date" name="drop_off_date" placeholder="drop_off_date" required>
                                    </div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Drop Off Time</label>
                                        <input type="time" class="form-control" id="drop_off_time" name="drop_off_time" placeholder="drop_off_time" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Seat No</label>
                                        <input type="number" class="form-control" id="seat" name="seat" placeholder="No of Seat" required>
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
