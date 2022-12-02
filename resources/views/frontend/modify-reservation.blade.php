@extends('frontend.partials.master')

@section('title','reservation')
@section('content')

	<!-- Inner Banner -->
	<section class="banner inner-banner" style="background: url({{asset('assets/images/ChZ7lj.jpg')}});">
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

	<!-- Profile Setting Section -->
	<div class="profile-setting">
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
			<div class="user-profile">
				<div class="user-img">
					<img src="{{asset('assets/images/user.png')}}" alt="image">
				</div>
				<div class="user-information">
					<h4>Wasif Khan</h4>
					<p>wasif</p>
					<div class="user-btn">
						<a href="#" class="upload-btn">Upload</a>
						<a href="#" class="remove-btn">Remove</a>
					</div>
				</div>
			</div>
			<div class="user-updation">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
							aria-selected="true">Cancel  / Modify Reservation </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
							aria-selected="false">Write a Review</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
							aria-selected="false">Update Personal Information</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<section class="travel-detail">
							<div class="bus-type default-form">
								<div class="form-group">
									<label>Bus Type</label>
									<div class="input-icon">
										<select placeholder="" class="form-control">
											<option>Bus Type</option>
											<option>Bus Type</option>
											<option>Bus Type</option>
										</select>
										<span><i class="fas fa-sort-down"></i></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="choose-bus-box">
										<div class="img-holder">
											<img src="{{asset('assets/images/choose-bus1.jpg')}}" alt="image">
										</div>
										<h4>Hybrid electric buses‎</h4>
										<div class="bus-info">
											<h4>Base Rate:</h4>
											<h4>$4.30</h4>
										</div>
										<div class="bus-info">
											<h4>Per Mile/KM:</h4>
											<h4>$2.00</h4>
										</div>
										<div class="bus-info">
											<h4>name of seatS:</h4>
											<h4>4</h4>
										</div>
										<a href="#">BOOK BUS</a>
									</div>
								</div>
								<div class="col">
									<div class="choose-bus-box">
										<div class="img-holder">
											<img src="{{asset('assets/images/choose-bus1.jpg')}}" alt="image">
										</div>
										<h4>Hybrid electric buses‎</h4>
										<div class="bus-info">
											<h4>Base Rate:</h4>
											<h4>$4.30</h4>
										</div>
										<div class="bus-info">
											<h4>Per Mile/KM:</h4>
											<h4>$2.00</h4>
										</div>
										<div class="bus-info">
											<h4>name of seatS:</h4>
											<h4>4</h4>
										</div>
										<a href="#">BOOK BUS</a>
									</div>
								</div>
								<div class="col">
									<div class="choose-bus-box">
										<div class="img-holder">
											<img src="{{asset('assets/images/choose-bus1.jpg')}}" alt="image">
										</div>
										<h4>Hybrid electric buses‎</h4>
										<div class="bus-info">
											<h4>Base Rate:</h4>
											<h4>$4.30</h4>
										</div>
										<div class="bus-info">
											<h4>Per Mile/KM:</h4>
											<h4>$2.00</h4>
										</div>
										<div class="bus-info">
											<h4>name of seatS:</h4>
											<h4>4</h4>
										</div>
										<a href="#">BOOK BUS</a>
									</div>
								</div>
								<div class="col">
									<div class="choose-bus-box">
										<div class="img-holder">
											<img src="{{asset('assets/images/choose-bus1.jpg')}}" alt="image">
										</div>
										<h4>Hybrid electric buses‎</h4>
										<div class="bus-info">
											<h4>Base Rate:</h4>
											<h4>$4.30</h4>
										</div>
										<div class="bus-info">
											<h4>Per Mile/KM:</h4>
											<h4>$2.00</h4>
										</div>
										<div class="bus-info">
											<h4>name of seatS:</h4>
											<h4>4</h4>
										</div>
										<a href="#">BOOK BUS</a>
									</div>
								</div>
								<div class="col">
									<div class="choose-bus-box">
										<div class="img-holder">
											<img src="{{asset('assets/images/choose-bus1.jpg')}}" alt="image">
										</div>
										<h4>Hybrid electric buses‎</h4>
										<div class="bus-info">
											<h4>Base Rate:</h4>
											<h4>$4.30</h4>
										</div>
										<div class="bus-info">
											<h4>Per Mile/KM:</h4>
											<h4>$2.00</h4>
										</div>
										<div class="bus-info">
											<h4>name of seatS:</h4>
											<h4>4</h4>
										</div>
										<a href="#">BOOK BUS</a>
									</div>
								</div>
							</div>
							<div class="bus-info-form">
								<form class="default-form">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>PICK UP LOCATION</label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>zip code</label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Pickup Date</label>
												<div class="input-icon">
													<input type="text" placeholder="" class="form-control">
													<span><i class="fas fa-calendar-alt"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Time</label>
												<div class="input-icon">
													<input type="text" placeholder="" class="form-control">
													<span><i class="far fa-clock"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>DROP OFF LOCATION</label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Return Date </label>
												<div class="input-icon">
													<input type="text" placeholder="" class="form-control">
													<span><i class="fas fa-calendar-alt"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<div class="form-group">
												<label>Time</label>
												<div class="input-icon">
													<input type="text" placeholder="" class="form-control">
													<span><i class="far fa-clock"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="form-group">
												<label>Please Select An age</label>
												<div class="input-icon select-icon">
													<select placeholder="" class="form-control">
														<option>22</option>
														<option>23</option>
														<option>24</option>
													</select>
													<span><i class="fas fa-sort-down"></i></span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Seats</label>
												<input type="text" placeholder="" class="form-control" value="02">
											</div>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<label></label>
											<a href="#" class="red-btn">cancel</a>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<label></label>
											<a href="#" class="blue-btn">modify</a>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<section class="travel-detail">
							<div class="bus-info-form">
								<form class="default-form">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Title</label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>review</label>
												<textarea class="form-control" placeholder=""></textarea>
											</div>
										</div>
									</div>
									<div class="start-rting">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									</div>
									<div class="row justify-content-center">
										<div class="col-lg-3 col-md-6 col-sm-12">
											<label></label>
											<a href="#" class="red-btn">post</a>
										</div>
										<div class="col-lg-3 col-md-6 col-sm-12">
											<label></label>
											<a href="#" class="blue-btn">cancel</a>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<section class="travel-detail">
							<div class="bus-info-form">
								<form class="default-form">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>First name <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label>last name <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-sm-8">
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
										</div>
										<div class="col-sm-2"></div>
										<div class="col-sm-12">
											<div class="form-group field-info">
												<label class="required-field">address <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
												<p>Street Address</p>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="required-field">City <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="required-field">State <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="required-field">Phone Number <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="required-field">Email</label>
												<input type="text" placeholder="" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="required-field">National ID verification <span class="required-field"><i class="fas fa-star-of-life"></i></span></label>
												<div class="row">
													<div class="col-md-6 col-sm-12 mb-3 mb-md-0">
														<div class="input-icon">
															<input type="text" placeholder="UPLOAD FRONT IMAGE" class="form-control">
															<span><i class="fas fa-cloud-upload-alt text-danger"></i></span>
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="input-icon">
															<input type="text" placeholder="UPLOAD FRONT IMAGE" class="form-control">
															<span><i class="fas fa-cloud-upload-alt text-danger"></i></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-3 col-md-6 col-sm-12 mt-3">
											<a href="#" class="blue-btn">Save</a>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
				</div>
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
@endsection
