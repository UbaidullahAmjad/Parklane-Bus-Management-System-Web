@extends('frontend.partials.master')

@section('content')
	<!-- Inner Banner -->
	<section class="banner inner-banner" style="background: url({{asset('assets/images/inner-banner2.jpg')}});">
		<div class="item">
			<div class="banner-text text-center">
				<h1>Schedule Trips</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
					  <li class="breadcrumb-item active" aria-current="page">Schedule Trips</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>

	<!-- Progress Section -->
	<section class="progress-section">
		<div class="container">
            @foreach ($errors->all() as $error)

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            @if($error == "validation.unique")
            <script>
                swal("Error!", 'User Email or Phone Number Already Exists', "error");
            </script>
            @elseif($error == "validation.confirmed")
            <script>
                swal("Error!", 'Passwords donot matched', "error");
            </script>
            @elseif($error)
            <script>
                swal("Error!", 'User Credentials are invalid', "error");
            </script>
            @endif


            @endforeach
			<div class="row">
				<div class="offset-lg-1 col-lg-10 col-md-12">
					<div class="progress-wrapp w-20per">
						<div class="progress-col active">
							<div class="pie-wrapper progress-full">
								<span class="label">
									<h2>
										1
										<small>step</small>
									</h2>
								</span>
								<div class="pie">
								  <div class="left-side half-circle"></div>
								  <div class="right-side half-circle"></div>
								</div>
							</div>
							<p>Travel Detail</p>
						</div>
						<div class="progress-col">
							<div class="pie-wrapper progress-full">
								<span class="label">
									<h2>
										2
										<small>step</small>
									</h2>
								</span>
								<div class="pie">
								  <div class="left-side half-circle"></div>
								  <div class="right-side half-circle"></div>
								</div>
							</div>
							<p>RESERVATION PROCESS</p>
						</div>
						<div class="progress-col">
							<div class="pie-wrapper progress-full">
								<span class="label">
									<h2>
										3
										<small>step</small>
									</h2>
								</span>
								<div class="pie">
								  <div class="left-side half-circle"></div>
								  <div class="right-side half-circle"></div>
								</div>
							</div>
							<p>PAYMENT OPTIONS</p>
						</div>
						<div class="progress-col">
							<div class="pie-wrapper progress-full">
								<span class="label">
									<h2>
										4
										<small>step</small>
									</h2>
								</span>
								<div class="pie">
								  <div class="left-side half-circle"></div>
								  <div class="right-side half-circle"></div>
								</div>
							</div>
							<p>Confirmation</p>
						</div>
						<span class="progress-border-status"></span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Travel Detail -->
	<section class="travel-detail" >
		<div class="container" style="display: none">
			<div class="heading text-center">
				<span>Welcome to conexi company</span>
				<h2>Travel Detail</h2>
			</div>
			<div class="bus-type default-form">
				<div class="form-group">
					<label>Bus Type</label>
					<div class="input-icon">
						<select placeholder="" class="form-control" id="bustype_id" name="bustype_id">
							@foreach ($bustype as $bustypo )
                            <option value="{{$bustypo->id}}">{{$bustypo->name}}</option>
                            @endforeach


						</select>
						<span><i class="fas fa-sort-down"></i></span>
					</div>
				</div>
			</div>
			<div class="row" id="bustype">
                @foreach ($buses as $bus)

                 	<div class="col-md-4" >
					<div class="choose-bus-box">
						<div class="img-holder">
							<img src="{{asset($bus->image)}}" width="100%" height="200px" alt="image">
						</div>
						<h4>{{$bus->name}}‎</h4>
						<div class="bus-info">
							<h4>Base Rate:</h4>
							<h4>${{$bus->base_rate}}</h4>
						</div>
						<div class="bus-info">
							<h4>Per Mile/KM:</h4>
							<h4>${{$bus->per_mile_rate}}</h4>
						</div>
						<div class="bus-info">
							<h4>NO of seats:</h4>
							<h4>{{$bus->no_of_seat}}</h4>
						</div>
                        <button class="form-control" data-toggle="modal" data-target="#myModal{{$bus->id}}">View Trips</button>
					</div>
				</div>
                 {{-------------------------------------------MODAL WEEK TRIPS -----------------------------------------------------------}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$bus->id}}" role="dialog">
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
                                                            @foreach ($bus->bustrip as $trip_detail)
                                                                @if($bus->id == $trip_detail->bus_id
                                                                && $trip_detail->pickup_date <= \Carbon\Carbon::now()->addDays(7)
                                                                && $trip_detail->drop_off_date <= \Carbon\Carbon::now()->addDays(7))
                                                                    <tr>
                                                                        <form method="POST" action="{{route('front.schedule-trips').'#bus_info_form'}}" class="form-control">
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


           {{ $buses->links('pagination.pagination') }}

			<div class="bus-info-form" id="bus_info_form">
                @if(Session::has('seaterror'))
                <p class="alert alert-info">{{ Session::get('seaterror') }}.Right Now the Avialable Seats are : {{Session::get('bustrip')}}</p>
                @endif
                @if(Session::has('timeout'))
                <p class="alert alert-warning">{{ Session::get('timeout') }}.</p>
                @endif
                @if(Session::has('sorry'))
                <p class="alert alert-primary">{{ Session::get('sorry')}}</p>
                @endif
                @if(Session::has('message'))
                <p class="alert alert-primary">{{ Session::get('message')}}</p>
                @endif
               @if (isset($booking))
               <a href=""  class="btn btn-xs btn-primary"><i class="fa fa-star"></i></a>
               @endif
               {{-- {{dd($BusSchedule)}} --}}
               @if (isset($BusSchedule))
               <form class="default-form" action="{{url('search-trip?buss_id='.$BusSchedule->id).'#bus_reservation_process'}}" method="POST" id="search_trip_form">
                {{-- @else --}}
                {{-- <form class="default-form" action="{{route('search.trip')}}" method="POST" id="search_trip_form"> --}}

                    {{ csrf_field() }}
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<label>PICK UP LOCATION</label>
                                    <input class="form-control"  list="pickup_locations" name="pickup_location" id="pick_up"
                                    value="{{$BusSchedule ? $BusSchedule->pickup_location : ''}}" required readonly>
                                {{-- @else
                                <?php   $pickup_loc = DB::table('bus_trips')->select('pickup_location')->groupBy('pickup_location')->get(); ?>

                                <input class="form-control" placeholder="Pick-Up Location"  list="pickup_location" name="pickup_location" id="pick_up" required>
                                        <datalist id="pickup_location">
                                            @foreach ($pickup_loc as $pl)
                                                <option value="{{$pl->pickup_location}}" />
                                            @endforeach
                                        </datalist> --}}
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label>Pickup Day </label>
								<div class="input-icon">
								    <input type="date" name="pickup_date" class="form-control"
                                    value="{{$BusSchedule? $BusSchedule->pickup_date : ''}}" readonly>
                                    {{-- @else
                                    <input type="date" name="pickup_date" class="form-control"
                                    value="{{$BusSchedule? $BusSchedule->pickup_date : ''}}">
                                    @endif --}}
									<!--<span><i class="fas fa-calendar-alt"></i></span>-->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label>Time</label>
								<div class="input-icon">
                                    <input type="time" placeholder="" name="pickup_time"
                                    value="{{$BusSchedule ? $BusSchedule->pickup_time : ''}}" class="form-control" required readonly>
                                    {{-- @else
                                    <input type="time" placeholder="" name="pickup_time"
                                    value="{{$BusSchedule ? $BusSchedule->pickup_time : ''}}" class="form-control" required>
                                    @endif --}}

									<!--<span><i class="far fa-clock"></i></span>-->
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<label>DROP OFF LOCATION</label>
                                <input type="text" placeholder="" name="drop_off_location"
                                value="{{$BusSchedule ? $BusSchedule->drop_off_location : ''}}" class="form-control" required readonly>


                                {{-- @else
                                <?php $dropoff_loc = DB::table('bus_trips')->select('drop_off_location')->groupBy('drop_off_location')->get(); ?>
                                <input class="form-control" placeholder="Drop-Off Location" list="drop_off_locations" name="drop_off_location" id="drop_off" required>
                                <datalist id="drop_off_locations">
                                    @foreach ($dropoff_loc as $dl)
                                        <option value="{{$dl->drop_off_location}}" />
                                    @endforeach
                                </datalist> --}}

							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label>DROP OFF Date</label>
								<div class="input-icon">
                                    <input type="date" name="drop_off_date"
                                    value="{{$BusSchedule ? $BusSchedule->drop_off_date : ''}}" class="form-control" readonly>
                                    {{-- @else
                                    <input type="date" name="drop_off_date"
                                    value="{{$BusSchedule ?  $BusSchedule->drop_off_date : ''}}" class="form-control"> --}}

									<!--<span><i class="fas fa-calendar-alt"></i></span>-->
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="form-group">
								<label>Time</label>
								<div class="input-icon">
                                    <input type="time" placeholder="" name="drop_off_time"
                                    value="{{$BusSchedule ?  $BusSchedule->drop_off_time : ''}}" class="form-control" required readonly>
                                    {{-- @else
                                    <input type="time" placeholder="" name="drop_off_time"
                                    value="{{$BusSchedule ? $BusSchedule->drop_off_time : ''}}" class="form-control" required> --}}
									<!--<span><i class="far fa-clock"></i></span>-->
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="form-group">
								<label>No of adults</label>
								<input type="number" placeholder="Enter Number Of Seats" name="adult_seat" min="1"
                                max="{{$BusSchedule ? $BusSchedule->left_seat : ''}}"  class="form-control" required>
							</div>
						</div>
                        <div class="col-lg-6 col-md-12">
							<div class="form-group">
								<label>No of children</label>
								<input type="number" placeholder="Enter Number Of Seats" name="child_seat" min="1"
                                max="{{$BusSchedule ? $BusSchedule->left_seat : ''}}"  class="form-control" required>
							</div>
						</div>
                        <input type="hidden" name="bus_id" value="{{$BusSchedule ? $BusSchedule->id : ''}}">
						<div class="col-lg-3 col-md-6 col-sm-12">
							<label></label>
							<a href="{{route('front.index')}}" class="red-btn">back</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<label></label>
							<button type="submit" class="blue-btn">next</a>
						</div>
					</div>
				</form>
                @endif
			</div>
		</div>


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
                                <input type="password" placeholder="Password" pattern="\w{8,}" title="Must contain at least 8 or more characters" name="password" class="form-control" required autocomplete="current-password" >
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
                                        <input type="text" placeholder="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-12 text-center">
                                    <label>OR</label>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" placeholder="" class="form-control">
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
	</section>

    <script>
        console.log(window.location.hash);
        var target = $(window.location.hash);
        $('html,body').animate({
            scrollTop: $('bus_info_form').offset().top;
            });
        // $('#book_form').scrollTop(0,80);
        // $('#search_trip_form').scrollBy(0,-60);
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>


        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $(document).ready(function() {

            $('#bustype_id').change(function(){
                var id = document.getElementById("bustype_id").value;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('bustype.travel') }}",
                    type: 'post',
                    data:{ bustype_id:id, _token: _token},

                    success: function(data) {
                        // console.log(data);
                        $('#bustype').html(data);
                        //  $("#count").html(data.count);

                        // alert(rowCount);
                    }

                });
            });
        });
    </script>
@endsection
