<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div>
                <img src="{{asset(Auth::user()->avatar)}}" alt="user-img" class="avatar avatar-lg brround">
                <a href="{{url('profile-user')}}" class="profile-img">
                    <span class="fa fa-pencil" aria-hidden="true"></span>
                </a>
            </div>
            <div class="user-info">
                <h2>Parklane</h2>
                <span>XPRESS</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Bus Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{route('buses.index')}}">Bus </a></li>
                <li><a class="slide-item" href="{{route('bus-type.index')}}"> BusType</a></li>
                {{-- <li><a class="slide-item" href="index3.html">Dashboard 3</a></li>
                <li><a class="slide-item" href="index4.html">Dashboard 4</a></li>
                <li><a class="slide-item" href="index5.html">Dashboard 5</a></li> --}}
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Booking</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>

                    <a href="{{route('bustrip.index')}}" class="slide-item">Bus Trips</a>
                </li>
                <li>
                    <a href="{{route('bustrip.details')}}" class="slide-item">Bus Trip Details </a>
                </li>
                <li>
                    <a href="{{route('check.booking')}}" class="slide-item">Booking</a>
                </li>
                {{-- <li>
                  <a href="notify.html" class="slide-item">Notifications</a>
                </li> --}}

            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Site Setting</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="side-menu__item" data-toggle="slide" href="#"><b>Header</b></a>
                    <ul class="slide-submenu">
                        <li><a class="slide-item" href="{{route('navbar.index')}}">Navbar</a></li>
                        <li><a class="slide-item" href="{{route('slider.index')}}">Slider</a></li>
                        <li><a class="slide-item" href="{{route('make-booking.index')}}">Make Your Booking</a></li>
                    </ul>
                </li>
                <li class="side">
                    <a class="side-menu__item" data-toggle="slide"><b>Footer</b></a>
                    <ul class="side-submenu">
                    <li><a class="slide-item" href="{{route('about.index')}}">About</a></li>
                    <li><a class="slide-item" href="{{route('contact.index')}}">Contact</a></li>
                    </ul>
                </li>
                <li class="side">
                    <a class="side-menu__item" data-toggle="slide"><b>About Us</b></a>
                    <ul class="side-submenu">
                        <li><a class="slide-item" href="{{route('abouts.abouthead')}}">Header</a></li>
                        <li><a class="slide-item" href="{{route('abouts-us.index')}}">Description</a></li>
                        <li><a class="slide-item" href="{{route('social-link.index')}}">Social Link</a></li>
                    </ul>
                </li>
                <li><a class="slide-item" href="{{route('newsletter.index')}}"><b>Newsletter</b></a></li>
                <li><a class="slide-item" href="{{route('faqs.index')}}"><b>FAQs</b></a></li>
                <li><a class="slide-item" href="{{route('query.index')}}"><b>Queries</b></a></li>
            </ul>
        </li>



        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-activity"></i><span class="side-menu__label">Travel Tip ana Info</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li>
                    <a href="{{route('travelimg.imgindex')}}" class="slide-item">Background Image </a>
                </li>
                <li>
                    <a href="{{route('travel-info.index')}}" class="slide-item">General Travel</a>
                </li>
                <li>
                    <a href="{{route('health.index')}}" class="slide-item">Health Concern</a>
                </li>
                <li>
                    <a href="{{route('safety.index')}}" class="slide-item">Safety Measures</a>
                </li>

            </ul>
        </li>
                <!--<li><a class="slide-item" href="{{route('user.index')}}"><i class="side-menu__icon  fe fe-user-alt"></i><b>User Management</b></a></li>-->
        <li>
            <a class="side-menu__item" href="{{route('feedback.index')}}"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Feedback</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{route('news-update.index')}}"><i class="side-menu__icon  fe fe-box"></i><span class="side-menu__label">News & Update</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{route('user.index')}}"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Users</span></a>
        </li>

    </ul>
</aside>
