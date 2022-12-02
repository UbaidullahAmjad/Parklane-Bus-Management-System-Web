
@extends('admin.partials.master')

@section('content')


<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Booking Details</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Booking Details</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking Details</li>
            </ol>
        </div>


        <!-- end row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-20">
                    <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title">Personal Info</h3>
                    </div>
                   
                        <form class="default-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label ><b> Name </b></label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->user->first_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Last Name <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->user->last_name}}" readonly>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-8">
                                    <div class="form-group field-info">
                                        <label>Date of Birth <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <input type="text" placeholder="" class="form-control">
                                                <p>Month</p>
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <input type="text" placeholder="" class="form-control">
                                                <p>Day</p>
                                            </div>
                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <input type="text" placeholder="" class="form-control">
                                                <p>Year</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-sm-2"></div>
                                <div class="col-sm-12">
                                    <div class="form-group field-info">
                                        <label class="required-field">Address <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->user->address}}" readonly>
                                        
                                    </div>
                                </div>
                               
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="required-field">Phone Number <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
                                        <input type="text" placeholder="" class="form-control" value="+{{$booking->user->phone}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="required-field">Email</label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->user->email}}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="required-field">Booking No</label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->booking_no}}" readonly>
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="required-field">Seat No</label>
                                        <input type="text" placeholder="" class="form-control" value="{{$booking->seat_no}}" readonly>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">Bus Trip Info</h3>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Pickup Location</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->pickup_location}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Drop Off Location</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->drop_off_location}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Pickup Date</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->pickup_date}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Pickup Time</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->pickup_time}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Drop Off Date</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->drop_off_date}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Drop Off Time</label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->drop_off_time}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="required-field">Bus Name </label>
                                                    <input type="text" placeholder="" class="form-control" value="{{$booking->bustrip->bus->name}}" readonly>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


