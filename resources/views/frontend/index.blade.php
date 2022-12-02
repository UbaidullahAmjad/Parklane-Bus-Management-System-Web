

@extends('frontend.partials.master')

@section('title','Home')
@section('content')



<section class="banner">

    <div class="owl-carousel owl-theme main-banner">
        @foreach ($slider as $slide )


        <div class="item" style="background: url({{asset($slide->image)}});">
            <div class="banner-text">
                <h1>{{$slide->heading}}</h1>
                <p>{{$slide->subHeading}} </p>
                <a href="{{url('aboutus')}}" class="banner-btn">Learn More</a>
            </div>
        </div>
        @endforeach
        {{-- <div class="item" style="background: url({{asset('assets/images/banner1.jpg')}});">
            <div class="banner-text">
                <h1>Cheap & Trusted Bus Company</h1>
                <p>Enjoy your comfortable trip with Conexi Company buses </p>
                <a href="{{url('aboutus')}}" class="banner-btn">Learn More</a>
            </div>
        </div>
        <div class="item" style="background: url({{asset('assets/images/banner1.jpg')}});">
            <div class="banner-text">
                <h1>Cheap & Trusted Bus Company</h1>
                <p>Enjoy your comfortable trip with Conexi Company buses </p>
                <a href="{{url('aboutus')}}" class="banner-btn">Learn More</a>
            </div>
        </div> --}}
    </div>
</section>


<!-- Booking Section -->
<section class="booking-wrapp">
    <div class="container">
    <!-- @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
    @endforeach -->
        <style>
                                        input[type="time"]::-webkit-calendar-picker-indicator{
                                        filter: invert(100%) sepia(13%) saturate(3207%) hue-rotate(130deg) brightness(100%) contrast(100%);
                                        }
                                        input[type="date"]::-webkit-calendar-picker-indicator{
                                        filter: invert(100%) sepia(13%) saturate(3207%) hue-rotate(130deg) brightness(100%) contrast(100%);
                                        }
									</style>
                                    @if(session()->get('message'))
                                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                        @if (session()->get('message') == "There Are not any type of trip exist ! Please choose an existing locations")
                                        <script>
                                            swal("Error!", "There Are not any type of trip exist ! Please set an existing locations ", "error");
                                        </script>
                                        @else
                                        <script>
                                            swal("Error!", 'Seats Limit are'.session()->get("message"), "error");
                                        </script>
                                        @endif

                                        @if (session()->get('message') == "Location does not contain return trip ! It is one-way route")
                                        <script>
                                            swal("Error!", 'Location does not contain return trip ! It is one-way route', "error");
                                        </script>
                                        @endif

                                    @endif

                                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                        @if ($errors->all())

                                        {{-- {{dd($errors->has('email') && $errors->has('phone'))}} --}}

                                        @if($errors->has('email') && $errors->has('phone'))
                                        <script>
                                            swal("Error!", 'User Email or Phone Number Already Exists', "error");
                                        </script>
                                         @elseif($errors->has('name'))
                                         <script>
                                             swal("Error!", 'User Name Error', "error");
                                         </script>
                                        @elseif($errors->has('password'))
                                        <script>
                                            swal("Error!", 'Password Error', "error");
                                        </script>
                                        @elseif($error == 'These credentials do not match our records.')
                                        <script>
                                            swal("Error!", 'These credentials do not match our records', "error");
                                        </script>
                                        @elseif($errors->has('return_date') && $errors->has('return_drop_off_time'))
                                        <script>
                                            swal("Error!", 'Please Enter Return Form Data', "error");
                                        </script>
                                        @elseif($errors->has('return_date'))
                                        <script>
                                            swal("Error!", 'Please Select Return Date', "error");
                                        </script>
                                         @elseif($errors->has('return_drop_off_time'))
                                         <script>
                                             swal("Error!", 'Please Select Return Drop Off Time', "error");
                                         </script>
                                        @endif

                                        @endif



        <div class="row align-items-center">
            {{-- <div class="col-md-5 col-sm-12">
                <div class="booking-heading heading-white heading left-heading">
                    <span>{{$makeBook->heading ?? ''}}</span>
                    <h2>{{$makeBook->heading1 ?? ''}}</h2>
                    <p>{{$makeBook->subHeading ?? ''}}</p>
                </div>
            </div> --}}
            <div class="col-md-12 col-sm-12">
                <div class="booking-form">
                    {{-- @foreach ($errors->all() as $item)
                        <li style="color: #ced4da">{{$item}}</li>
                    @endforeach --}}
                    {{-- @if ($errors->all())
                        {{dd($errors->all())}}
                    @endif --}}
                       <form  action="{{route('bus_search_trips')}}" method="POST" >
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                {{-- <input class="form-control" placeholder="Pick-Up Location" list="pickup_locations" name="pickup_location" id="pick_up">
                                <datalist id="pickup_locations">
                                    @foreach ($pickup_loc as $pl)
                                        <option value="{{$pl->pickup_location}}" />
                                    @endforeach
                                </datalist> --}}
                                <select class="form-select form-control" name="pickup_location" id="pick_up"
                                aria-label="Default select example" required>
                                    <option selected>Pick up Location</option>
                                    @foreach ($pickup_loc as $pl)
                                    <option value="{{$pl->pickup_location}}">{{$pl->pickup_location}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                {{-- <input class="form-control" placeholder="Drop-Off Location" list="drop_off_locations" name="drop_off_location" id="drop_off">
                                <datalist id="drop_off_locations">
                                    @foreach ($dropoff_loc as $dl)
                                        <option value="{{$dl->drop_off_location}}" />
                                    @endforeach
                                </datalist> --}}
                                <select class="form-select form-control" name="drop_off_location" id="drop_off" aria-label="Default select example" required>
                                <option selected>Drop Off Location</option>
                                @foreach ($dropoff_loc as $dl)
                                        <option value="{{$dl->drop_off_location}}">{{$dl->drop_off_location}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="date" placeholder="Pickup date" name="pickup_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <input type="date" placeholder="Pickup date" name="drop_off_date" class="form-control" required>
							</div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-select form-control" name="pick_up_time" aria-label="Default select example" required>
                                    <option selected>Pick up time</option>
                                    <option value="12:00:00">12pm</option>
                                    <option value="15:00:00">3pm</option>
                                    <option value="18:00:00">6pm</option>
                                  </select>
							</div>
                        </div>
                        <div class="col-lg-6 col-sm-12">

                            <div class="form-group">
								  <select class="form-select form-control" name="drop_off_time" aria-label="Default select example" required>

                                    <option selected>Drop off time</option>
                                    <option value="12:00:00">12pm</option>
                                    <option value="15:00:00">3pm</option>
                                    <option value="18:00:00">6pm</option>
                                  </select>
							</div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="number" placeholder="No. of adults"
                                onkeydown="javascript: return event.keyCode === 8 ||
                                event.keyCode === 46 ? true : !isNaN(Number(event.key))"
                                name="adult_seat" min="1"
                                class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <input type="number"
                                onkeydown="javascript: return event.keyCode === 8 ||
                                event.keyCode === 46 ? true : !isNaN(Number(event.key))"
                                placeholder="No. of children" name="child_seat" min="1"
                                class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-check" style="padding-left: 3rem;">
                                    <input class="form-check-input" name="return_trip" id="return_trip"
                                    type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault" style="color: white">
                                      Return Trip
                                    </label>
                                  </div>
                            </div>
                        </div>
                           <!-- Return Trip Form Modal -->
                        <div class="modal fade return_trip-form" id="return_trip_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-form modal-content">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-wrapp">
                                                <h3 class="form-feading">Return Trip Details</h3>
                                                        <div class="form-group">
                                                            <label style="text-transform: unset;">Return Trip Pickup Date</label>
                                                            <input type="date" placeholder="dd/mm/yyyy" name="return_pickup_date" class="form-control"  :value="old('return_date')">
                                                        </div>

                                                    <div class="form-group">
                                                        <label style=";text-transform: unset;">Return Trip Pickup Time</label>
                                                        <select class="form-select form-control" name="return_pickup_time" aria-label="Default select example">
                                                            <option value="">Pick Up time</option>
                                                            <option value="12:00:00">12pm</option>
                                                            <option value="15:00:00">3pm</option>
                                                            <option value="18:00:00">6pm</option>
                                                          </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="text-transform: unset;">Return Trip Drop-Off Date</label>
                                                        <input type="date" placeholder="dd/mm/yyyy" name="return_dropoff_date" class="form-control"  :value="old('return_date')">
                                                    </div>

                                                    <div class="form-group">
                                                        <label style="text-transform: unset;">Return Trip Drop-Off Time</label>
                                                        <select class="form-select form-control" name="return_drop_off_time" aria-label="Default select example">
                                                            <option value="">Drop off time</option>
                                                            <option value="12:00:00">12pm</option>
                                                            <option value="15:00:00">3pm</option>
                                                            <option value="18:00:00">6pm</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label style=";text-transform: unset;">Return Trip No. of adults</label>
                                                        <input type="number" placeholder="No. of adults"
                                                        onkeydown="javascript: return event.keyCode === 8 ||
                                                        event.keyCode === 46 ? true : !isNaN(Number(event.key))"
                                                        name="return_adult_seat" min="1"
                                                        class="form-control">

                                                    </div>
                                                    <div class="form-group">
                                                        <label style=";text-transform: unset;">Return Trip No. of children</label>
                                                        <input type="number"
                                                        onkeydown="javascript: return event.keyCode === 8 ||
                                                        event.keyCode === 46 ? true : !isNaN(Number(event.key))"
                                                        placeholder="No. of children" name="return_child_seat" min="1"
                                                        class="form-control" >
                                                    </div>
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="form-btn">Book Now</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="road-img">
    <img src="{{asset('assets/images/road.jpg')}}" alt="image">
</div>

<!-- Choose Bus Section -->
<section class="choose-bus">
    <div class="container">

        <div class="heading text-center" style="display: none">
				<span>Our best BUS</span>
				<h2>Choose BUS</h2>
			</div>


        <div class="bus-tabs" style="display: none">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($bustype as $bustypo )
                @if($loop->index>3)
                @break
                @endif
                <li class="nav-item">
                    <button class="nav-link" onclick="busType('{{$bustypo->id}}')"
                     >{{$bustypo->name}}</button>
                </li>
                @endforeach
            </ul>

            @if (isset($req))
            <div class="tab-content" id="myTabContent">
                <div class="row" id="mybusType">

                </div>
                    <div class="row" id="hide_this_div">

                        <?php $already = "" ?>
                        @foreach ($all_searched_buses as $buses)
                        {{-- {{dump($buses->bustrip)}} --}}

                        {{-- {{dump("ALREADY".$already)}}
                        {{dump("BUS->ID".$buses->id)}} --}}
                        {{-- @endforeach
                        @endif --}}
                        {{-- {{dd("HERE")}} --}}
                        @if ($buses->id != $already)

                        <div class="col-md-4">
                            <div class="choose-bus-box">
                                <div class="img-holder">
                                    <img src="{{asset($buses->image)}}" width="100%" height="200px" alt="image">
                                </div>
                                <h4>{{$buses->name}}</h4>
                                <div class="bus-info">
                                    <h4>Base Rate:</h4>
                                    <h4>$ {{$buses->base_rate}}</h4>
                                </div>

                                <div class="bus-info">
                                    <h4>no of seatS:</h4>
                                    <h4>{{$buses->no_of_seat}}</h4>
                                </div>
                                <button class="form-control" data-toggle="modal" data-target="#myModal{{$buses->id}}">View Trips</button>
                            </div>
                        </div>

                        @endif
                         {{-------------------------------------------MODAL SEARCH TRIPS -----------------------------------------------------------}}
                            <!-- Modal -->



                            <div class="modal fade" id="myModal{{$buses->id}}" role="dialog">
                                <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="display: inline">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bus Trips</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Pick-Up Time</th>
                                                        <th>Drop-Off Time</th>
                                                        <th>Seats Available</th>
                                                        <th>Book Now</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                            @foreach ($buses->bustrip as $trip_detail)
                                                            @if($trip_detail->pickup_location == $pickup_location
                                                            && $trip_detail->drop_off_location == $drop_off_location
                                                            && $buses->id == $trip_detail->bus_id)
                                                                <tr>
                                                                    <form method="POST" action="{{url('search-trip?buss_id='.$trip_detail->id).'#bus_reservation_process'}}" class="form-control">
                                                                        {{-- {{dd($drop_off_time)}} --}}
                                                                        {{ csrf_field() }}
                                                                    <td>
                                                                        <input type="hidden" value="{{$trip_detail->pickup_location}}">
                                                                        {{$trip_detail->pickup_location}}</td>
                                                                    <td> <input type="hidden" value="{{$trip_detail->drop_off_location}}">
                                                                        {{$trip_detail->drop_off_location}}</td>
                                                                    <td><input type="hidden" value="{{$trip_detail->pickup_time}}">
                                                                        {{$trip_detail->pickup_time}}</td>
                                                                    <td><input type="hidden" value="{{$trip_detail->drop_off_time}}">
                                                                        {{$trip_detail->drop_off_time}}</td>
                                                                    <td><input type="hidden" name="left_seat" value="{{$trip_detail->left_seat}}">
                                                                        {{$trip_detail->left_seat}}</td>
                                                                        <input type="hidden" name="id" value="{{$trip_detail->id}}" >
                                                                    <td>
                                                                        @if ($trip_detail->left_seat <= 0)
                                                                            <button class="btn btn-primary" type="submit" disabled>Book Now</button>
                                                                        @else
                                                                            <button class="btn btn-primary" type="submit">Book Now</button>
                                                                        @endif
                                                                    </td>
                                                                    </form>
                                                                </tr>
                                                                @endif
                                                            @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            <?php $already = $buses->id ?>
                            @endforeach
                    </div>
                    {{-- {{dd("HERE")}} --}}
                    @else
                    <div class="tab-content" id="myTabContent">
                        <div class="row" id="mybusType">

                        </div>
                            <div class="row" id="hide_this_div">

                                @foreach ($buses as $bus)
                                <div class="col-md-4">
                                    <div class="choose-bus-box">
                                        <div class="img-holder">
                                            <img src="{{asset($bus->image)}}" width="100%" height="200px" alt="image">
                                        </div>
                                        <h4>{{$bus->name}}</h4>
                                        <div class="bus-info">
                                            <h4>Base Rate:</h4>
                                            <h4>$ {{$bus->base_rate}}</h4>
                                        </div>

                                        <div class="bus-info">
                                            <h4>no of seatS:</h4>
                                            <h4>{{$bus->no_of_seat}}</h4>
                                        </div>
                                        <button class="form-control" data-toggle="modal" data-target="#myModal1{{$bus->id}}">View Trips</button>
                                    </div>
                                </div>
                                {{-------------------------------------------MODAL WEEK TRIPS -----------------------------------------------------------}}
                                    <!-- Modal -->
                                <div class="modal fade" id="myModal1{{$bus->id}}" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header"  style="display: inline">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Bus Trips</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
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
                                                        {{-- {{dd(\Carbon\Carbon::now()->addDays(7))}} --}}
                                                        {{-- {{dd($bus)}} --}}
                                                        @foreach ($bus->bustrip as $trip_detail)
                                                            @if($bus->id == $trip_detail->bus_id
                                                            && $trip_detail->pickup_date <= \Carbon\Carbon::now()->addDays(7)
                                                            && $trip_detail->drop_off_date <= \Carbon\Carbon::now()->addDays(7))
                                                                <tr>
                                                                    <form method="POST" action="{{url('search-trip?buss_id='.$trip_detail->id).'#bus_reservation_process'}}" class="form-control">
                                                                        {{ csrf_field() }}
                                                                        <td>
                                                                        <input type="hidden" name="pickup_location" value="{{$trip_detail->pickup_location}}">
                                                                        {{$trip_detail->pickup_location}}</td>
                                                                    <td> <input type="hidden" name="drop_off_location" value="{{$trip_detail->drop_off_location}}">
                                                                        {{$trip_detail->drop_off_location}}</td>
                                                                    <td><input type="hidden" name="pickup_date" value="{{$trip_detail->pickup_date}}">
                                                                            {{$trip_detail->pickup_date}}</td>
                                                                    <td><input type="hidden" name="drop_off_date" value="{{$trip_detail->drop_off_date}}">
                                                                            {{$trip_detail->drop_off_date}}</td>
                                                                    <td><input type="hidden" name="pickup_time" value="{{$trip_detail->pickup_time}}">
                                                                        {{$trip_detail->pickup_time}}</td>
                                                                    <td><input type="hidden" name="drop_off_time" value="{{$trip_detail->drop_off_time}}">
                                                                        {{$trip_detail->drop_off_time}}</td>
                                                                    <td><input type="hidden" name="left_seat" value="{{$trip_detail->left_seat}}">
                                                                        {{$trip_detail->left_seat}}</td>

                                                                    <input type="hidden" name="id" value="{{$trip_detail->id}}" >
                                                                    <input type="hidden" name="bus_id" value="{{$trip_detail->bus_id}}">
                                                                    <td>
                                                                    @if ($trip_detail->left_seat <= 0)
                                                                            <button class="btn btn-primary" type="submit" disabled>Book Now</button>
                                                                        @else
                                                                            <button class="btn btn-primary" type="submit">Book Now</button>
                                                                    @endif
                                                                    </td>
                                                                    </form>
                                                                </tr>
                                                                @endif
                                                            @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                    </div>
                    @endif
        </div>






    </div>
</section>
<div class="road-img" style="display: none">
    <img src="{{asset('assets/images/road.jpg')}}" alt="image">
</div>

<!-- Blog Section -->
<section class="blog-section">
    <div class="container">
        @foreach($newsupdate as $newsUp)
        <!-- {{dump($newsUp)}} -->
        <div class="heading text-center">
            <span>{{$newsUp->heading}}</span>
            <h2>{{$newsUp->heading1}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-6">
                    <div class="blog-left-section">
                        <div class="img-holder">
                            <img src="{{asset($newsUp->image)}}" alt="image">
                        </div>
                    </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="blog-left-section right-blog-box pl-4">
                    <span class="blog-date">{{$newsUp->created_at}}</span>
                    <h4>{{$newsUp->title}}</h4>
                    <p>{{$newsUp->descripton}}</p>
                    <h4>{{$newsUp->title2}}</h4>
                    <p>{{$newsUp->descripton2}}</p>
                    <h4>{{$newsUp->title3}}</h4>
                    <p>{{$newsUp->descripton3}}</p>
                    <div class="d-flex mt-2">
                            <p>by admin</p>
                    </div>
                </div>
            </div>
<!--
            <div class="col-lg-7 col-md-6">
                <div class="blog-left-section right-blog-box">
                    <div class="img-holder" style="background: url(images/blog-2-1.jpg);"></div>
                    <div class="right-blog-info">
                        <span class="blog-date">{{$newsUp->created_at}}</span>
                        <h4><a href="#">We ensure you that your journey is comfortable and safe</a></h4>

                    </div>
                </div>
            </div> -->

        </div>
        @endforeach
    </div>
</section>



    <!-- Login Form Modal -->
    <div class="modal fade login-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-form modal-content">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="img-holder h-100" style="background: url({{asset('assets/images/bus-alliance.jpg')}});">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-wrapp">
                            <h3 class="form-feading">Login</h3>
                            <form class="default-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" name="email" class="form-control"  :value="old('email')" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" name="password" class="form-control"
                                    required autocomplete="current-password" pattern="\w{8,}" title="Must contain at least 8 or more characters"
                                    title="Must contain at least 8 or more characters">
                                </div>
                                {{-- <div class="form-group">
                                    <a href="#" class="forgot-pass" data-dismiss="modal" data-toggle="modal" data-target=".forgot-password">I forgot my password</a>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <button class="form-login">LOG IN</button>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <a href="#" class="create-account"  data-dismiss="modal" data-toggle="modal" data-target=".create-account-new">Create New Account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Modal -->
    <div class="modal fade forgot-password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-form modal-content">
                <div class="row no-gutters">
                    <div class="col-sm-12">
                        <div class="form-wrapp">
                            <h3 class="form-feading">Password Reset</h3>
                            <p>Enter your username or email address, and we'll send you a password reset email.</p>
                            <form class="default-form mt-5">
                                <div class="row align-items-center">
                                    <div class="col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label>PHONE NUMBER</label>
                                            <input type="text" placeholder="" class="form-control"
                                            pattern="^[3][0-9]{9}$">
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-12 text-center">
                                        <label>OR</label>
                                    </div>
                                    <div class="col-md-5 col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" placeholder="" class="form-control" pattern="\w{8,}" title="Must contain at least 8 or more characters">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 col-sm-12">
                                        <button class="form-login">LOG IN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create New Account Modal -->
    <div class="modal fade create-account-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-form modal-content">
                <div class="row no-gutters justify-content-center">
                    <div class="col-sm-10">
                        <div class="form-wrapp">
                            <h3 class="form-feading text-center">Create New Account</h3>
                            <form class="default-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="usertype" value="User">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Name" name="name" class="form-control" :value="old('name')" required autofocus
                                            pattern="^[a-zA-Z ]*$">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" placeholder="First Name" name="first_name"
                                            class="form-control" :value="old('first_name')" required autofocus
                                            pattern="^[a-zA-Z]+$">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Last Name" name="last_name" class="form-control"
                                            :value="old('last_name')" required autofocus pattern="^[a-zA-Z]+$">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Password*</label>
                                            <input  type="password"
                                    name="password" class="form-control"
                                    required autocomplete="new-password" placeholder="**********" pattern="\w{8,}" title="Must contain at least 8 or more characters">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email" class="form-control" name="email"
                                            :value="old('email')" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password"
                                    name="password_confirmation" required class="form-control" pattern="\w{8,}" title="Must contain at least 8 or more characters">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>PHONE NUMBER*</label>
                                            <div>
                                            <h3 style="    float: left;width: 20%;
                                            padding: .375rem .75rem;
                                            font-size: 1.25rem;
                                            line-height: 1.5;
                                            background-color: #f6f6f6;
                                            border: 1px solid #ced4da;
                                            border-radius: .25rem;
                                            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">+92</h3>
                                            <input type="tel" placeholder="Phone Number" class="form-control" name="phone" :value="old('phone')" required autofocus
                                            style="width: 80%;float:right;" pattern="^[3][0-9]{9}$">
                                            </div>
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
                                <div class="form-group">
                                    <p>We require full identity verification from all new members. We will also check if your profile is fake, so please only submit your real profile. This field won't be visible to other members, only our staff will be able to view your profile. Please enter the full URL to your Facebook or Instagram account.</p>
                                </div>
                                <div class="form-group check-box">
                                    <p>Email/SMS confirmation</p>
                                    <label><input type="checkbox" name="confirmation" required> I agree to receive emails/SMS regarding Parklane activity and my membership.</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <button class="form-login">Register</button>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <a href="#" class="create-account" data-dismiss="modal" data-toggle="modal" data-target=".login-form">Sign In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

        var $firstSelect = jQuery('select[name="pickup_location"]');
        var $secondSelect = jQuery('select[name="drop_off_location"]');

        $firstSelect.change(function () {
            // if ($firstSelect.val() == ) {
            //     $secondSelect.show();
            // } else {
            //     $secondSelect.find("option[value='" + $firstSelect.val() + "']").show();
            // }
            // console.log($firstSelect.val());
            // console.log($("#drop_off").children('option').prop(2,true));
            // console.log($("#pick_up").prop('selectedIndex'));
            $index = $("#pick_up").prop('selectedIndex');
            console.log($index);
            $total_options = $('#pick_up option').length;
            // console.log( $("#drop_off").children("option[value=" + $firstSelect.val() + "]").hide());
            if($firstSelect.val()){
                var value = $firstSelect.val();
                console.log(value);
                $replacedFirst = value.replace(' ','',$firstSelect.val());
                if($index == 0)
                {
                    $('#drop_off option:eq(0)').prop('selected', true)
                    $("#drop_off").children('option').show();
                }
                else{
                $("#drop_off").children('option').show();
                // $("#drop_off").children("option[value=" + value + "]").hide();
                $("#drop_off").children("option:eq("+$index+")").hide();

                if($index == 1)
                {
                    $index11 = $index+1;
                    $('#drop_off option:eq('+$index11+')').prop('selected', true)
                }
                else if($index == 2)
                {
                    $index12 = $index-1;
                    $('#drop_off option:eq('+$index12+')').prop('selected', true)

                }

                }
            }
        });
        $secondSelect.change(function(){
            $index2 = $("#drop_off").prop('selectedIndex');
            if($secondSelect.val()){
                var value2 = $secondSelect.val();
                $replacedSecond = value2.replace(' ',' ',$secondSelect.val());
                if($index2==0)
                {
                    $('#pick_up option:eq(0)').prop('selected', true)
                    $("#pick_up").children('option').show();
                }
                else{
                    $("#pick_up").children('option').show();
                    // $("#pick_up").children("option[value=" + $replacedSecond + "]").hide();

                    // $('#pick_up option:eq('+$index2+')').prop('selected', true)
                    $("#pick_up").children("option:eq("+$index2+")").hide();
                    if($index2 == 1)
                    {
                            $index21 = $index2+1;
                            $('#pick_up option:eq('+$index21+')').prop('selected', true)
                    }
                    else if($index2 == 2)
                    {
                            $index22 = $index2-1;
                            $('#pick_up option:eq('+$index22+')').prop('selected', true)

                    }
                }

            }
        });



        $('#return_trip').change(function(){
            if ($('#return_trip').is(':checked')) {
                // append goes here
                console.log("CHECKED");
                $('#return_trip_modal').modal('show');
            }
        });

      function busType(id)
      {
        var _token = $('input[name="_token"]').val();
        $.ajax({
        type:"post",
        url: "{{ route('bustype.show') }}",
        data:{id:id, _token: _token},
        success: function(data)
        {
            console.log(data);
            $('#mybusType').empty();
            $('#hide_this_div').css('display','none');
            $('#mybusType').html(data).serialize();
        }});
      }


</script>
@endsection


