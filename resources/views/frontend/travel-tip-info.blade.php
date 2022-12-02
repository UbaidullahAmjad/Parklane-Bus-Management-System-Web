

@extends('frontend.partials.master')
@section('content')
	<!-- Inner Banner -->
	<section class="banner inner-banner" style="background: url({{asset('assets/images/inner-banner2.jpg')}});">
		<div class="item">
			<div class="banner-text text-center">
				<h1>Travel Tips and Info</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
					  <li class="breadcrumb-item active" aria-current="page">Travel Tips And Info</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>

	<!-- General Travel Info Section -->
	<section class="general-travel-info">
		<div class="container">
            @foreach ($errors->all() as $error)

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
                swal("Error!", 'Passwords donot matched', "error");
            </script>
            @endif


            @endforeach
			<div class="row">
				<div class="offset-lg-1 col-lg-10 col-md-12">
					<div class="heading text-center">
						<span>{{$traveltip->heading}}</span>
						<h2>{{$traveltip->heading2}}</h2>
						<p>{{$traveltip->description}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="media left-media-box">
						<div class="media-body">
						  <h5 style="font-size: 26px;text-transform: uppercase;
                          font-family: 'futurabold';display: inline-block;
                          margin-bottom: 15px;color: #1B92C8;">{{$traveltip->mission}}</h5>
						  <p>{{$traveltip->mission_desc}}.</p>
						</div>
						<span class="about-social-icon"><i class="fas fa-map-signs"></i></span>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="media">
						<span class="about-social-icon"><i class="fas fa-phone-volume"></i></span>
						<div class="media-body">
						  <h5 style="font-size: 26px;text-transform: uppercase;
                          font-family: 'futurabold';display: inline-block;
                          margin-bottom: 15px;color: #1B92C8;">{{$traveltip->awards}}</h5>
						  <p>{{$traveltip->awards_desc}}</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="media left-media-box">
						<div class="media-body">
						  <h5 style="font-size: 26px;text-transform: uppercase;
                          font-family: 'futurabold';display: inline-block;
                          margin-bottom: 15px;color: #1B92C8;">{{$traveltip->principles}}</h5>
						  <p>{{$traveltip->principles_desc}}.</p>
						</div>
						<span class="about-social-icon"><i class="fas fa-calendar-alt"></i></span>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="media">
						<span class="about-social-icon"><i class="fas fa-briefcase"></i></span>
						<div class="media-body">
						  <h5 style="font-size: 26px;text-transform: uppercase;
                          font-family: 'futurabold';display: inline-block;
                          margin-bottom: 15px;color: #1B92C8;">
                          {{$traveltip->history}}</a></h5>
						  <p>{{$traveltip->history_desc}}.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Health Concerns Section -->
	<section class="health-concerns">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="heading left-heading">
						<span>{{$healthconcern->heading}}</span>
						<h2>{{$healthconcern->heading2}}</h2>
						<p>{{$healthconcern->description}}.</p>
					</div>
					<div class="read-more-wrapp">
						<!-- <a href="#" class="simple-link">Read More</a> -->
						<div class="health-concerns-feture row ml-2" >
							<p><img src="{{asset('assets/images/clock.svg')}}" alt="image"> <span>Ontime at<br>Services</span></p>
							<p><img src="{{asset('assets/images/help.svg')}}" alt="image"> <span>24/7 Help<br>Services</span></p>
							<p class="button3"><img src="{{asset('assets/images/verified.svg')}}" alt="image"> <span>Verified<br>Professionals</span></p>
						</div>
					</div>
				</div>
				<!-- <div class="offset-md-1 col-md-5 col-sm-12">
					<div class="img-holder">
						<img src="{{asset($healthconcern->image)}}" alt="image">
					</div>
				</div> -->
			</div>
		</div>
	</section>


	<!-- Safety Measures Section -->
	<section class="safety-measures">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-12">
					<div class="img-holder">
						<img src="{{asset($safetMeasure->image)}}" alt="image">
					</div>
				</div>
				<div class="col-md-7 col-sm-12">
					<div class="heading left-heading heading-white">
						<span>{{$safetMeasure->heading}}</span>
						<h2>{{$safetMeasure->heading2}}</h2>
					</div>
					<ul class="ul-list list-icon">
						<li>{{$safetMeasure->description}}</li>
						<li>Carry with you at all times the contact details of the Australian embassy.</li>
						<li>For up-to-date information on 'safe' and 'unsafe' areas of the city, consult with your hotel manager or local tourist information officer.</li>
						<li>Try to blend in with the locals and avoid looking or acting like a tourist.</li>
						<li>If you are mugged, don't fight back. It is better to lose a few dollars and a wristwatch than get injured.</li>
					</ul>
				</div>
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
