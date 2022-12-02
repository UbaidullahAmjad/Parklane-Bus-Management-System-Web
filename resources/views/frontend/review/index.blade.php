@extends('frontend.partials.master')

@section('title','review')
@section('content')
   <style>
       *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>

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

        @if (isset($userCompleteRides))
        <form class="default-form" action="{{route('rating.create')}}" method="post">
            @csrf
            <div class="row">
                {{-- <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" placeholder="" class="form-control">
                    </div>
                </div> --}}
                   <input type="hidden" name="id" value="{{$userCompleteRides->bustrip_id}}">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>review</label>
                        <textarea class="form-control" name="comment" placeholder=""></textarea>
                    </div>
                </div>
            </div>
            <div class="rate" style="align-content: center">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label></label>
                    <button type="submit" class="red-btn">post</a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <label></label>
                    <a href="#" class="blue-btn">cancel</a>
                </div>
            </div>
        </form>
        @else
         <strong><h2>Are you sure you complete your Trip</h2></strong>
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
                        <div class="form-group">
                            <a href="#" class="forgot-pass" data-dismiss="modal" data-toggle="modal" data-target=".forgot-password">I forgot my password</a>
                        </div>
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













<script type="text/javascript">

    $("#input-id").rating();

</script>
@endsection
