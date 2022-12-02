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
            <div class="card-body">
                <div class="row" style="display: flex">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title font-weight-normal">Active Rides</h3>
                            <div class="card-options"></div>
                        </div>
                        <div class="card-body ">
                            <h2 class="text-dark  mt-0">{{$userActiveRides}}</h2>
                            <div class="progress progress-sm mt-0 mb-2">
                                <div class="progress-bar bg-primary w-" role="progressbar"></div>
                            </div>
                            <div class=""><i class="fa fa-caret-up text-green mr-1"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title font-weight-normal">Total Rides</h3>
                            <div class="card-options">  </div>
                            <!--<a class="btn btn-sm btn-primary" href="#">View</a-->
                        </div>
                        <div class="card-body ">
                            <h2 class="text-dark  mt-0">{{$userTotalRides}}</h2>
                            <div class="progress progress-sm mt-0 mb-2">
                                <div class="progress-bar bg-primary w-" role="progressbar"></div>
                            </div>
                            <div class=""><i class="fa fa-caret-up text-green mr-1"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
                    <div class="card overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title font-weight-normal">Complate Rides</h3>
                            <div class="card-options">  </div>
                        </div>
                        <div class="card-body ">
                            <h2 class="text-dark  mt-0">{{$userCompleteRides}}</h2>
                            <div class="progress progress-sm mt-0 mb-2">
                                <div class="progress-bar bg-primary w-" role="progressbar"></div>
                            </div>
                            <div class=""><i class="fa fa-caret-up text-green mr-1"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--    <a colspan="8" class="col-md-11 text-right" id="button" onclick="printpage()" id="printpagebutton">-->
            <!--<button type="button" class="btn btn-warning" onclick="printpage()"><i-->
            <!--        class="icon icon-printer"></i></button>-->
            <!--</a>-->
            <!--<select class="form-control" name="buses" id="buses">-->
            <!--    <option> Select the bus...</option>-->
            <!--    @foreach ($buses as $bu )-->
            <!--    <option value="{{$bu->id}}"><strong>{{$bu->name}}</strong></option>-->
            <!--    @endforeach-->
            <!--</select>-->
            <b><h4>Booking History</h4></b>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Booking NO.</th>
                            <th>BusTrip ID</th>
                            <th>Pick Up</th>
                            <th>Drop Off</th>
                            <th>No 0f Seat</th>
                            <th>User Name</th>
                            <th>Status</th>
{{--
                            <th>Action</th> --}}

                        </tr>
                    </thead>
                    <tbody id="showBooking">
                       @foreach ($userBooking as $book )
                         <tr>
                             <td>{{$loop->index+1}}</td>
                              <td>{{$book->booking_no}}</td>
                             <td>{{$book->bustrip_id}}</td>
                             <td>{{$book->bustrip->pickup_location }}</td>
                             <td>{{$book->bustrip->drop_off_location}}</td>

                             <td>{{$book->seat_no}}</td>
                              <td>{{$book->user->name}}</td>
                              <td>
                              @if ($book->active == 0 && $book->status==1)
                              <span class="mb-2 mr-2 badge badge-Warning">Active</span>
                              @elseif ($book->status==0)
                              <span class="mb-2 mr-2 badge badge-danger">Cancel</span>
                              @else
                              <span class="mb-2 mr-2 badge badge-success">Completed</span>
                              @endif
                            </td>
                            {{-- @php $rating = willvincent\Rateable\Rating::where('rateable_id',$book->bustrip_id)->where('user_id',auth()->user()->id)->first(); @endphp
                            <td>
                                @if ($book->active == 1 && $book->status==1)
                                    @if(!$rating)
                                        <a href="{{route('rating.index',$book->bustrip_id)}}"  class="btn btn-xs btn-primary"><i class="fa fa-star"></i></a>
                                    @endif
                                @else
                                <a href="" class="btn btn-xs btn-warning"><i class="fa fa-window-close"></i></a>
                                @endif
                                <a href="" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                            </td> --}}


                     </tr>

                       @endforeach
                        <tfoot>
                         <tr>
                             <td>Total Trip </td>
                         <td id="count" colspan="4">{{count($userBooking)}}</td>
                         </tr>
                        </tfoot>




                    </tbody>
                </table>
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
