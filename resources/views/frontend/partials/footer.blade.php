
<footer class="footer">
    <div class="container">
        @if(session()->get('message') == "Newsletter Successfully Subscribed.")
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal("Success", "Newsletter Successfully Subscribed.", "success");
        </script>
        @endif
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="footer-box">
                @foreach ($about as $abou)


                    <h4>{{$abou->name}}</h4>
                    <p class="pr-5">{{$abou->text}}</p>
                    @endforeach
                    <div class="top-banner-right">
                        <a href="{{$navbar->link2 ?? ''}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$navbar->link1 ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$navbar->link3 ?? ''}}"><i class="fab fa-youtube"></i></a>
                        <a href="{{$navbar->link4 ?? ''}}"><i class="fab fa-google-plus-g"></i></a>
                    </div>

                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="footer-box">
                    <h4>Links</h4>
                    <ul class="footer-link">
                        <li><a href="{{route('front.about')}}">About</a></li>
                        <li><a href="{{url('schedule-trips')}}">Book A Bus</a></li>
                        <li><a href="{{url('faq')}}">Contact Us</a></li>
                        {{-- <li><a href="{{url('faq')}}">Latest News</a></li> --}}
                        <!--<li><a href="{{route('contact.index')}}">Contact</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-box">
                    @foreach ($contact as $cont )


                    <h4>{{$cont->name}}</h4>
                    <p>{{$cont->text}}</p>
                    @endforeach
                    <div class="footer-info">
                        @if (Route::has('login'))
                                @auth
                                	@else
                       	<a href="#" data-toggle="modal" data-target=".login-form"><i class="fas fa-user"></i> log in / sign in</a>
                        		@endauth
            				@endif
                        <a href="tel:{{$navbar->phone ?? ''}}"><i class="fas fa-phone"></i> {{$navbar->phone ?? ''}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-box">
                    <h4>Newsletter</h4>
                    <p></p>
                        <form action="{{route('newsletter.store')}}" method="post">
                            @csrf
                          <div class="footer-newsletter">

                        <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        <button type="submit">Go</button>

                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>© 2021 PARKLANETRAVELS.COM</p>
            <!-- <div class="copyright-link">
                <a href="#">Terms of Use</a>
                <a href="#">Privacy Policy</a>
            </div> -->
        </div>
    </div>
</footer>
