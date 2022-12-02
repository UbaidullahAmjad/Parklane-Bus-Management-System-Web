    <header class="header">
		<div class="header-top">
			<div class="container">
                @if(session()->get('message') == "There Are not any type of trip exist ! Please set an existing locations")
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        swal("Error!", "There Are not any type of trip exist ! Please set an existing locations ", "error");
                    </script>
                @elseif(session()->get('message') == "OOps there have no trip ! Sorry")
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        swal("Error!", "OOps there have no trip ! Sorry", "error");
                    </script>
                @endif
				<div class="row">

					<div class="col-sm-8">
						<div class="top-banner-left">

						    @if (Route::has('login'))
                                @auth
                                <div class="dropdown show">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth::user()->name}}
                                    </a><a href="mailto:{{$navbar->link ?? ''}}"><i class="fas fa-envelope"></i> {{$navbar->name ?? ''}}</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding-right:0px">
                                    <form action="{{route('profile.user')}}" method="get" >
                                    @csrf
                                        <x-responsive-nav-link :href="route('logout')" style="color:black" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Profile') }}
                                        </x-responsive-nav-link>
                                    </form>
                                    <form action="{{route('view.booking')}}" method="get" >
                                            @csrf
                                        <x-responsive-nav-link :href="route('logout')" style="color:black" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('View Booking') }}
                                        </x-responsive-nav-link>
                                    </form>
                                    <form action="{{route('logout')}}" method="post" >
                                        @csrf
                                        <x-responsive-nav-link :href="route('logout')" style="color:black" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <!--<i class="dropdown-icon  icon icon-power"></i>-->
                                            {{ __('Log out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </div>
                                </div>
            					@else
            					<a href="#" data-toggle="modal" data-target=".login-form"><i class="fas fa-user"></i> log in / sign in</a>
                                <a href="mailto:{{$navbar->link ?? ''}}" id="EMAIL" ><i class="fas fa-envelope"></i> {{$navbar->name ?? ''}}</a>
            					@endauth
            				@endif

						</div>
					</div>
					<div class="col-sm-4">
						<div class="top-banner-right">
    						<a href="{{$navbar->link2 ?? ''}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$navbar->link1 ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$navbar->link3 ?? ''}}"><i class="fab fa-youtube"></i></a>
                            <a href="{{$navbar->link4 ?? ''}}"><i class="fab fa-google-plus-g"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menu-wrapp">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-expand-lg navbar-light">
							<button class="navbar-toggler navbar-toggler-right collapsed" type="button"
								data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
								aria-expanded="false" aria-label="Toggle navigation">
								<span> </span>
								<span> </span>
								<span> </span>
							</button>
						    <a class="navbar-brand" href="{{route('front.index')}}"><img class="mx-auto d-block" src="{{asset($navbar->image ?? '')}}"
                                alt="logo">
							</a>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav">
                                <li class="nav-item {{ Request::segment(1) === 'index' ? 'active' : null }}">
                                    <a class="nav-link"  href="{{route('front.index')}}">Home</a>
                                </li>
                                <li class="nav-item {{ Request::segment(1) === 'about' ? 'active' : null }}">
                                    <a class="nav-link" href="{{route('front.about')}}">ABOUT US</a>
                                </li>
                                <li class="nav-item {{ Request::segment(1) === 'travel-tip-info' ? 'active' : null }}">
                                    <a class="nav-link" href="{{route('front.travel-tip-info')}}">TRAVEL TIPS AND INFO</a>
                                </li>
                                <li class="nav-item {{ Request::segment(1) === 'schedule-trips' ? 'active' : null }}">
                                    <a class="nav-link" href="{{route('front.schedule-trips')}}">SCHEDULE TRIPS</a>
                                </li>
                                <li class="nav-item {{ Request::segment(1) === 'schedule-trips1' ? 'active' : null }}">
                                    <a class="nav-link" href="{{route('frontend.faq')}}">FAQs AND CUSTOMER SUPPORT</a>
                                </li>
                            </ul>
							</div>
							<div class="menu-contact">
								<span class="bg-white"></span>
								<h4>{{$navbar->phone ?? ''}} <small>PHONE LINE</small></h4>
								<span class="phone-icon"><img src="{{asset('assets/images/phone.svg')}}" alt="image"></span>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
