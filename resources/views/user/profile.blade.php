<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Profile</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ url('world-front') }}/img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('world-front') }}/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('profile') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('profile') }}/vendors/linericon/style.css">
    <link rel="stylesheet" href="{{ url('profile') }}/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/owl-carousel/owl.carousel.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/lightbox/simpleLightbox.css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/nice-select/css/nice-select.css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/animate-css/animate.css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/popup/magnific-popup.css"> --}}
    {{-- <link rel="stylesheet" href="{{ url('profile') }}/vendors/flaticon/flaticon.css"> --}}
    <!-- main css -->
    <link rel="stylesheet" href="{{ url('profile') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('profile') }}/css/responsive.css">  


</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="index.html"><img src="{{ url('world-front') }}/img/core-img/logo.png" alt="Logo"></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>

                                </li>
                                <li class="nav-link">
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                                                                            {{ Auth::user()->name }} <span class="caret"></span>
                                                                                        </a>
                    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>
                    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <a class="dropdown-item" href="{{ route('user.profile', ((!Auth::guard('admin')) ? Auth::user()->id : '')) }}">Profile</a>
                                        </div>
                                    </li>
                                    @endguest
                                </li>
                    
                            </ul>
                            <!-- Search Form  -->
                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Search something...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="container box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="banner_content">
                    <div class="media">
                        <div class="d-flex">
                            <img style="max-width:750px; height:600px" src="{{ $user->user_profile }}" alt="">
                        </div>
                        <div class="media-body">
                            <div class="personal_text">
                                <h6>Hello Everybody, i am</h6>
                                <h3>{{ $user->first_namee . ' ' . $user->last_namee}}</h3>
                                <h4>Norml User in the Blog with Plan of {{ $user->subscription->notification_format}}</h4>
                                <p>You will begin to realise why this exercise is called the Dickens Pattern (with reference
                                    to the ghost showing Scrooge some different futures)</p>
                                <ul class="list basic_info">
                                    <li><a href="#"><i class="lnr lnr-calendar-full"></i> Member Since : {{ date('d-m-Y', strtotime($user->created_at)) }}</a></li>
                                    <li><a href="#"><i class="lnr lnr-phone-handset"></i> 44 (012) 6954 783</a></li>
                                    <li><a href="#"><i class="lnr lnr-envelope"></i> Email: {{ $user->email }}</a></li>
                                </ul>
                                <ul class="list personal_social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Welcome Area =================-->
    <section class="welcome_area p_120">
        <div class="container">
            <div class="row welcome_inner">
                <div class="col-lg-6">
                    <div class="welcome_text">
                        <h4>About Myself</h4>
                        <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards
                            especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job
                            is beyond reproach. inappropriate behavior is often laughed.</p>
                        <div class="row">
                            My Recent Posts
                            @foreach ($user->posts as $item)
                                
                                <div class="col-md-4">
                                    <div class="wel_item">

                                    <a href="{{ route('post.show', $item->id ) }}" >
                                            <i class="lnr lnr-database"></i>
                                            <h5 class="text-center">{{$item->title}}</h5>
                                            
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tools_expert">
                        <div class="skill_main">
                            <div class="skill_item">
                                <h4>After Effects <span class="counter">85</span>%</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="skill_item">
                                <h4>Photoshop <span class="counter">90</span>%</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="skill_item">
                                <h4>Illustrator <span class="counter">70</span>%</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="skill_item">
                                <h4>Sublime <span class="counter">95</span>%</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="skill_item">
                                <h4>Sketch <span class="counter">75</span>%</h4>
                                <div class="progress_br">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- ***** Footer Area Start ***** -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <a href="#"><img src="{{ url('world-front') }}/img/core-img/logo.png" alt=""></a>
                    <div class="copywrite-text mt-30">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>                            by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <ul class="footer-menu d-flex justify-content-between">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Gadgets</a></li>
                        <li><a href="#">Video</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="footer-single-widget">
                    <h5>Subscribe</h5>
                    <form action="#" method="post">
                        <input type="email" name="email" id="email" placeholder="Enter your mail">
                        <button type="button"><i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ***** Footer Area End ***** -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ url('profile') }}/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="{{ url('profile') }}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{ url('profile') }}/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="{{ url('profile') }}/js/plugins.js"></script>
<!-- Active js -->
<script src="{{ url('profile') }}/js/active.js"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ url('profile') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ url('profile') }}/js/popper.js"></script>
{{-- <script src="{{ url('profile') }}/js/bootstrap.min.js"></script> --}}
<script src="{{ url('profile') }}/js/stellar.js"></script>
{{-- <script src="{{ url('profile') }}/vendors/lightbox/simpleLightbox.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/nice-select/js/jquery.nice-select.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/isotope/imagesloaded.pkgd.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/isotope/isotope.pkgd.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/owl-carousel/owl.carousel.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/popup/jquery.magnific-popup.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/js/jquery.ajaxchimp.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/counter-up/jquery.waypoints.min.js"></script> --}}
{{-- <script src="{{ url('profile') }}/vendors/counter-up/jquery.counterup.min.js"></script> --}}
<script src="{{ url('profile') }}/js/mail-script.js"></script>
<script src="{{ url('profile') }}/js/theme.js"></script>


<!-- jQuery (Necessary for All JavaScript Plugins) -->
    {{-- <script src="{{ url('world-front') }}/js/jquery/jquery-2.2.4.min.js"></script> --}}
    <!-- Popper js -->
    <script src="{{ url('world-front') }}/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ url('world-front') }}/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ url('world-front') }}/js/plugins.js"></script>
    <!-- Active js -->
    <script src="{{ url('world-front') }}/js/active.js"></script>

</body>

</html>
