@extends('frontend.partials.master')

@section('content')

		<!-- Inner Banner -->
        <section class="banner inner-banner" style="background: url({{asset('assets/images/tourismo-rhd-teaser.jpg')}});">
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

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                @if ($errors->all())

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
                    swal("Error!", 'Passwords donot matched', "error");
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


                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12">
                        <div class="progress-wrapp w-100per">
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
                            <div class="progress-col active">
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
                            <div class="progress-col active">
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
        <section class="travel-detail">
            <div class="container">
                <div class="heading text-center">
                    <span>Welcome to conexi company</span>
                    <h2>Confirmation</h2>
                </div>
                <div class="conf-img">
                    <img src="{{asset('assets/images/check.png')}}" alt="image">
                </div>
                <div class="confirmation">
                    <form class="default-form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>bus name</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$buses->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>bus #plate</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$buses->plate_no}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Passenger Name</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$user->name ?? ''}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>booking number</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$booking->booking_no}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>pickup location/date/time</label>
                                    <input type="text" placeholder="" class="form-control"
                                    value="{{$bustrip->pickup_location}}/{{$bustrip->pickup_date}}/{{$bustrip->pickup_time}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>drop off location/date/time</label>
                                    <input type="text" placeholder="" class="form-control"
                                    value="{{$bustrip->drop_off_location}}/{{$bustrip->drop_off_date}}/{{$bustrip->drop_off_time}}" disabled>
                                </div>
                            </div>
                            {{-- {{dd($booking_return)}} --}}
                            @if (isset($booking_return) != null)

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Return booking number</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$booking_return->booking_no}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Return pickup location/date/time</label>
                                    <input type="text" placeholder="" class="form-control"
                                    value="{{$bustrip->pickup_location}}/{{$bustrip->pickup_date}}/{{$bustrip->pickup_time}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Return drop off location/date/time</label>
                                    <input type="text" placeholder="" class="form-control"
                                    value="{{$bustrip->drop_off_location}}/{{$bustrip->drop_off_date}}/{{$bustrip->drop_off_time}}" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Return Trip Seats</label>
                                    <input type="text" placeholder="" class="form-control"
                                    value="{{$return_seats}}" disabled>
                                </div>
                            </div>

                            @endif

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>NUMBER OF SEATS</label>
                                    <input type="text" placeholder="" class="form-control" value="{{$seat}}" disabled>
                                </div>
                            </div>
                            @if(Auth::user() == null)
                                @if (isset($booking_return) != null)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <a href="{{ route('front.index')}}" class="red-btn">back</a>
                                    </div>
                                @else
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <a href="{{ route('front.index')}}" class="red-btn">back</a>
                                </div>
                                @endif
                            @else
                                @if (isset($booking_return) != null)
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="{{ route('front.index')}}" class="red-btn">back</a>
                                    </div>
                                    @else
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="{{ route('front.index')}}" class="red-btn">back</a>
                                    </div>
                                @endif
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{route('view.booking')}}" class="blue-btn mt-3 mt-md-0">GO TO YOUR RIDE</a>
                            </div>
                            @endif
                        </div>
                    </form>
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


	@endsection
