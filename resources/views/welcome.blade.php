<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>World - Blog &amp; Magazine Template</title>

    <!-- Favicon  -->

    <link rel="stylesheet" href="{{ url('world-front') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('world-front') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('world-front') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('world-front') }}/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('thehome') }}/css/tooplate-style.css">

    <!-- Style CSS -->


    <!-- Favicon  -->
    {{--
    <link rel="icon" href="{{ url('world-front') }}/img/core-img/favicon.ico"> --}}

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('world-front') }}/style.css">
</head>

<body>


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
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Gadgets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Lifestyle</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
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
                                            <a class="dropdown-item" href="index.html">Home</a>
                                            <a class="dropdown-item" href="catagory.html">Catagory</a>
                                            <a class="dropdown-item" href="single-blog.html">Single Blog</a>
                                            <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('user.profile', ((!Auth::guard('admin')) ? Auth::user()->id : '')) }}">Profile</a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
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
    </header>
    <!-- ***** Header Area End ***** -->




    <!-- FEATURE -->
    <section id="home" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="home-info">
                        <div class="home-info">
                            <h3>professional landing page</h3>
                            <h1>We help you manage your website successfully!</h1>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>What you get</h1>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Responsive</a></li>

                        <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Mobile</a></li>

                        <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Support</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab01" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Minimal Design</h2>
                                <p>Nam feugiat a ante sollicitudin luctus. Quisque eget placerat massa. Ut quis ligula ornare,
                                    pellentesque velit eget, vestibulum est. Donec pretium tristique elit eget sodales. Pellentesque
                                    posuere.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>Easy to use</h2>
                                <p>Aliquam massa massa, consectetur non mattis fringilla, sodales ac turpis. Morbi ac felis
                                    sagittis, faucibus mauris vitae, placerat mauris.</p>
                            </div>
                        </div>


                        <div class="tab-pane" id="tab02" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Compatible Browsers</h2>
                                <p>Nam maximus elit a metus luctus, a faucibus magna mattis. Ut malesuada viverra iaculis. Nunc
                                    euismod sit amet neque a tincidunt.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>User Friendly</h2>
                                <p>Maecenas maximus velit lorem, quis pharetra turpis fringilla id. Vestibulum tempor facilisis
                                    efficitur. Sed nec nisi sit amet nibh pellentesque elementum.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>HTML5 & CSS3</h2>
                                <p>In viverra ipsum ornare sapien rhoncus ullamcorper. Vivamus vitae risus ac mi vehicula sagittis.
                                    Nulla dictum magna sit amet pharetra aliquam.</p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab03" role="tabpanel">
                            <div class="tab-pane-item">
                                <h2>Quick Support</h2>
                                <p>Mauris rutrum est at fringilla pulvinar. Nam ligula urna, lobortis non scelerisque vel, molestie
                                    eu massa. Nullam mattis elit at tortor accumsan.</p>
                            </div>
                            <div class="tab-pane-item">
                                <h2>Managed Stuffs</h2>
                                <p>Quisque ullamcorper sem quis sapien cursus efficitur. Sed id sodales ipsum. Morbi eleifend
                                    tempus erat sit amet vehicula. Nulla at posuere tellus, non mattis erat. Nulla id massa
                                    gravida.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="feature-image">
                        <img src="{{ url('thehome') }}/images/feature-mockup.png" class="img-responsive" alt="Thin Laptop">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                        <div class="section-title">
                            <h1>Professional Team for you</h1>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="team-thumb">
                            <img src="{{ url('thehome') }}/images/team-image1.jpg" class="img-responsive" alt="Andrew Orange">
                            <div class="team-info team-thumb-up">
                                <h2>Andrew Orange</h2>
                                <small>Art Director</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et
                                    dolore magna.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="team-thumb">
                            <div class="team-info team-thumb-down">
                                <h2>Catherine Soft</h2>
                                <small>Senior Manager</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et
                                    dolore magna.</p>
                            </div>
                            <img src="{{ url('thehome') }}/images/team-image2.jpg" class="img-responsive" alt="Catherine Soft">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="team-thumb">
                            <img src="{{ url('thehome') }}/images/team-image3.jpg" class="img-responsive" alt="Jack Wilson">
                            <div class="team-info team-thumb-up">
                                <h2>Jack Wilson</h2>
                                <small>CEO / Founder</small>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing eiusmod tempor incididunt ut labore et
                                    dolore magna.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>





    <!-- PRICING -->
    <section id="pricing" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>Choose any plan</h1>
                    </div>
                </div>
                @foreach ($subscriptions as $subscription)
                    
                <div class="col-md-4 col-sm-6">
                    <div class="pricing-thumb">
                        <div class="pricing-title">
                            <h2>{{ $subscription->name }}</h2>
                        </div>
                        <div class="pricing-info">
                            @foreach ($subscription->features_as_feature as $item)
                                
                                <p>{{ $item }}</p>
                            @endforeach
                            
                        </div>
                        <div class="pricing-bottom">
                            <h4 class="pricing-dollar">{{ $subscription->plan_price }}</h4> <br>
                            <a href="{{ route('register') }}" class="section-btn pricing-btn">Register now</a>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </section>

    </div <!-- ***** Footer Area Start ***** -->
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
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i>                                by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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


    <!-- SCRIPTS -->
    <script src="{{ url('thehome') }}/js/jquery.js"></script>
    <script src="{{ url('thehome') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('thehome') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ url('thehome') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('thehome') }}/js/smoothscroll.js"></script>
    <script src="{{ url('thehome') }}/js/custom.js"></script>



    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ url('world-front') }}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ url('world-front') }}/js/popper.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ url('world-front') }}/js/plugins.js"></script>
    <!-- Active js -->
    <script src="{{ url('world-front') }}/js/active.js"></script>

</body>

</html>