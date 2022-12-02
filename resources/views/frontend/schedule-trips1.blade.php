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
            {{-- @if ($errors->all())

            {{dd($errors->all())}}
            @endif --}}
            @foreach ($errors->all() as $error)

            {{-- <li>{{$error}}</li> --}}

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                @endif

            <!--<div class="text-center bg-danger">Phone Number is Incorrect.!</div>-->
{{--
                <script>
                swal("Error!", "User Input Data Is Incorrects", "error");
                </script> --}}



            @endforeach
			<div class="row">
				<div class="offset-lg-1 col-lg-10 col-md-12">
					<div class="progress-wrapp w-50per">
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
						<div class="progress-col active">
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

	<section class="travel-detail reservation-process">
		<div class="container">
			<div class="heading text-center" id="bus_reservation_process">
				<span>Welcome to conexi company</span>
				<h2>Reservation Process</h2>
			</div>
            @if (session('error'))
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

           <script>
            $(function() {
                $('.login-form').modal('show');
            });
            </script>
            @endif
			<div class="row">
				{{-- <div class="col-xl-5 col-lg-6 col-md-12">
					<div class="bus-information-wrapp">
						<div class="bus-information-header">
							<div class="bus-information-header-left">
								<p>Parklane</p>
								<h5>{{$bustrip->name}}</h5>
								<span>RENT PER DAY</span>
								{{$bustrip->base_rate}}
							</div>
							<div class="bus-information-header-left">
                                <span>{{$bustrip->pickup_location}} to </span> <span>{{$bustrip->drop_off_location}}</span>
                                <br>
								<span>{{$bustrip->pickup_date}}</span> / <span>{{$bustrip->drop_off_date}}</span>
                                <br>
                                <span>{{$bustrip->pickup_time}} </span> / <span>{{$bustrip->drop_off_time}}</span>
							</div>

						</div>
						<div class="bus-information-wrapp-img">
							<img src="{{asset($bustrip->image)}}" alt="image">
						</div>
						<div class="bus-information-wrapp-footer">
							<ul>
								<li><i class="fas fa-user"></i> PASSENGERS: {{$bustrip->no_of_seat}}</li>
								<li><i class="fas fa-luggage-cart"></i> PASSENGERS: {{Session::get('seat')}}</li>
								<li><i class="fas fa-temperature-high"></i> AIR CONDITIONING: YES</li>
							</ul>
						</div>
					</div>
				</div> --}}

                {{-- {{dd(session()->get('seat'))}} --}}
				@php
				use App\Models\User;
				use Illuminate\Support\Facades\Auth;
				$user = User::where('id',Auth::user()->id ?? '')->first();
                $bustrip = Session::get('bustrip');
				@endphp


				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="bus-info-form">
						<h3 class="form-feading">Personal Information</h3>
                        {{-- {{dump(Session::all())}}  --}}
                        {{-- {{dd($bustrip)}} --}}
                        {{-- {{dd((Session::get('bustrip'))->id)}} --}}
						<form class="default-form" action="{{route('trip.payment')}}" method="get">

                              <input type="hidden" name="bustrip_id" value="{{$bustrip->id}}">
                            <input type="hidden" name="bus_id" value="{{$bustrip->bus_id}}">

                             <input type="hidden" name="seat" value={{$seats}}>
                            {{--<input type="hidden" name="booking_date" value="{{session('booking_date')}}"> --}}


							<div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>PICK UP LOCATION</label>
                                                <input class="form-control"  list="pickup_locations" name="pickup_location" id="pick_up"
                                                value="{{$bustrip->pickup_location}}" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Pickup Day </label>
                                            <div class="input-icon">
                                                <input type="date" name="pickup_date" class="form-control"
                                                value="{{$bustrip->pickup_date}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="input-icon">
                                                <input type="time" placeholder="" name="pickup_time"
                                                value="{{$bustrip->pickup_time}}" class="form-control" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>DROP OFF LOCATION</label>
                                            <input type="text" placeholder="" name="drop_off_location"
                                            value="{{$bustrip->drop_off_location}}" class="form-control" required readonly>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>DROP OFF Date</label>
                                            <div class="input-icon">
                                                <input type="date" name="drop_off_date"
                                                value="{{$bustrip->drop_off_date}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="input-icon">
                                                <input type="time" placeholder="" name="drop_off_time"
                                                value="{{$bustrip->drop_off_time}}" class="form-control" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>No of adults</label>
                                            <input type="number" placeholder="Enter Number Of Seats" name="adult_seat" min="1"
                                            max="{{$bustrip->left_seat}}"  class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>No of children</label>
                                            <input type="number" placeholder="Enter Number Of Seats" name="child_seat" min="1"
                                            max="{{$bustrip->left_seat}}"  class="form-control" required>
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>FIRST NAME*</label>
                                            <input type="text" placeholder="" class="form-control" name="first_name" value="{{$user->first_name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>LAST NAME*</label>
                                            <input type="text" placeholder="" class="form-control" name="last_name" value="{{$user->last_name ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>PHONE NUMBER*</label>
                                            <div>
                                                @if (Auth::user() == null)
                                                <h3 style="    float: left;width: 20%;
                                                padding: .375rem .75rem;
                                                font-size: 1.25rem;
                                                line-height: 1.5;
                                                background-color: #f6f6f6;
                                                border: 1px solid #ced4da;
                                                border-radius: .25rem;
                                                transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">+92</h3>
                                                <input type="text" placeholder="" class="form-control"
                                                pattern="^[3][0-9]{9}$" name="phone" value="{{$user->phone ?? ''}}"
                                                style="width: 80%;float:right;">

                                                @else
                                                <input type="text" placeholder="" class="form-control" pattern="^[3][0-9]{9}$" name="phone" value="{{$user->phone ?? ''}}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>EMAIL*</label>
                                            <input type="email" placeholder="" class="form-control" name="email" value="{{$user->email ?? ''}}">
                                        </div>
                                    </div>
                                    {{-- @if (!$user)
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                    @endif --}}

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>ADDRESS*</label>
                                            <input type="text" placeholder="" name="address" class="form-control" value="{{$user->address ?? ''}}">
                                        </div>
                                    </div>
                                    @if (Auth::user() == null)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <a href="#" data-toggle="modal" class="form-control" data-target=".login-form"><i class="fas fa-user"></i> log in / sign in</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" name="return_guest" type="checkbox" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  Continue As Guest
                                                </label>
                                              </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <label></label>
                                                <a href="{{ route('front.index')}}" class="red-btn">back</a>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <label></label>
                                                <button type="submit" class="blue-btn">next</button>
                                            </div>
                                        </div>
                                    </div>

							</div>
						</form>
					</div>

                        {{-- @auth
                        <a href="#" data-toggle="modal" class="form-control" data-target=".login-form"><i class="fas fa-user"></i> log in / sign in</a>
                        @endauth --}}
				</div>
			</div>
		</div>

		<!-- Login Form Modal -->
<div class="modal fade login-form" id="login_modal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

                           {{-- <input type="hidden" name="bustrip_id" value="{{$bustrip->id}}">
                           <input type="hidden" name="bus_id" value="{{$bustrip->bus_id}}">
                           <input type="hidden" name="seat" value="{{$seats}}"> --}}
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
        $('html,body').animate({
            scrollTop: $('#bus_reservation_process').offset().top
            });
        // $('#book_form').scrollTop(0,80);
        // $('#search_trip_form').scrollBy(0,-60);
    </script>



@endsection
