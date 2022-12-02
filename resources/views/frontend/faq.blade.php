@extends('frontend.partials.master')

@section('content')


	<!-- Inner Banner -->
	<section class="banner inner-banner" style="background: url({{asset('assets/images/ChZ7lj.jpg')}});">
		<div class="item">
			<div class="banner-text text-center mw-100">
				<h1>FAQs and Customer Support</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
					  <li class="breadcrumb-item active" aria-current="page">FAQs AND CUSTOMER SUPPORT</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>

	<!-- Faq Section -->
	<section class="faq-section">
		<div class="container">
			<div id="accordion">


                @foreach ($faq as $fa)


				<div class="faq-card">
					<h5 id="headingOne" data-toggle="collapse" data-target="#collapse-{{$fa->id}}" aria-expanded="true" aria-controls="collapseOne">{{ $fa->question}}</h5>

					<div id="collapse-{{$fa->id}}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="faq-card-body">
							<p>{{$fa->answers}}</p>
						</div>
					</div>
				</div>
                @endforeach


			</div>
		</div>
	</section>

	<!-- Travel Detail -->
	<section class="travel-detail">
		<div class="container">
        @if (session()->get('message'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Login Error!","Please Login To Send Message" , "error");
            </script>
        @endif
        @if(session()->get('status'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                swal("Success","Message Successfully Send" , "success");
            </script>
        @endif

        @foreach ($errors->all() as $error)

        {{dump($error)}}

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

			<div class="heading text-center">
				<span>Welcome to conexi company</span>
				<h2>Chat With us / Leave A Query</h2>
			</div>
			<div class="faq-form-wrapp">
				<form class="faq-form" action="{{route('query.store')}}" method="POST">
                    @csrf
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="text" placeholder="NAME:" name="name" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="number" placeholder="PHONE NO:" name="phone" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="email" placeholder="EMAIL:" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="form-group">
								<input type="text" placeholder="SUBJECT:" name="subject" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<textarea type="text" placeholder="Message:" name="message" class="form-control" required></textarea>
							</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-lg-2 col-md-3 col-sm-12">
							<button type="submit" class="blue-btn">SEND MESSAGE</button>
						</div>
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
                                        pattern="^[a-zA-Z]*$">
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
