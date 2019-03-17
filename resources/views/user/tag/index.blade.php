@include('user.partials.header')
   
    @include('user.partials.nav')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url({{ url('world-front') }}/img/blog-img/bg3.jpg);"></div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-100">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">

                            

                            <div class="tab-content" id="myTabContent">
                                @foreach ($posts as $post)
                                    
                                    <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                        <!-- Single Blog Post -->
                                        <div class="single-blog-post post-style-4 d-flex align-items-center">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="{{ $post->main_image }}">
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="{{ route('post.show', $post->id) }}" class="headline">
                                                    <h5>{{ $post->title }}</h5>
                                                </a>
                                                <p>{{ $post->summary }}...</p>
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <p>by<a href="{{ route('user.profile', $post->user_id) }}" class="post-author"> {{ $post->user->first_namee . ' ' . $post->user->last_namee }}</a> on <a href="#" class="post-date">{{ date('M, d, Y', strtotime($post->created_at)) . ' at ' . date('H:i', strtotime($post->created_at))  }}</a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Single Blog Post -->
                                        
                                    </div>
                                @endforeach

                                <div class="tab-pane fade" id="world-tab-2" role="tabpanel" aria-labelledby="tab2">
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ url('world-front') }}/img/blog-img/b18.jpg" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="headline">
                                                <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts
                                                    in Physics?</h5>
                                            </a>
                                            <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink
                                                coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                {{-- <p><a href="#" class="post-author">{{ $post->user->first_namee . ' ' . $post->user->last_namee  }}</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Search Tag : {{ $tag->name }}</h5>
                            <div class="widget-content">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                                    <!-- Post Content -->
                                    <div class="post-content text-center">
                                        {{ $tag->name }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('user.partials.footer')