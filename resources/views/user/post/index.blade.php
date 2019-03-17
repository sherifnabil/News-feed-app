@include('user.partials.header')
    @include('user.partials.nav')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-600 bg-img background-overlay" style="background-image: url({{ url('world-front') }}/img/blog-img/bg2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- Catagory -->
                        <h3>{{ ucwords($post->title) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
<!-- ========== Sidebar Area ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area mb-100">
                
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            {{-- //// hot posts ////////// --}}
                            <h5 class="title">Top Articles</h5>
                            <div class="widget-content">
                                @foreach ($recent_posts as $recent)                                    
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ $recent->main_image }}" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="{{ route('post.show', $recent) }}" class="headline">
                                                <h5 class="mb-0">{{ ucwords($recent->title) }}</h5>
                                            </a>
                                            <p>{{ $recent->summary }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                                        
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            {{-- //// Recomended posts ////////// --}}
                            <h5 class="title">Trending Stories</h5>
                            <div class="widget-content">
                                @foreach ($recent_posts as $recent)                                    
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ $recent->main_image }}" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="{{ route('post.show', $recent) }}" class="headline">
                                                <h5 class="mb-0">{{ ucwords($recent->title) }}</h5>
                                            </a>
                                            <p>{{ $recent->summary }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="sidebar-widget-area">
                            {{-- //// Recomended posts ////////// --}}
                            <h5 class="title">Latest Articles</h5>
                            <div class="widget-content">
                                @foreach ($recent_posts as $recent)                                    
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ $recent->main_image }}" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="{{ route('post.show', $recent) }}" class="headline">
                                                <h5 class="mb-0">{{ ucwords($recent->title) }}</h5>
                                            </a>
                                            <p>{{ $recent->summary }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Stay Connected</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
                <!-- ============= Post Content Area ============= -->
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <p><a href="{{ route('user.profile', $post->user_id) }}" class="post-author">{{ $post->user->first_namee . ' ' . $post->user->last_namee}}</a> on <a href="#" class="post-date">{{ date('M, d, Y', strtotime($post->created_at)) . ' at ' . date('H:i', strtotime($post->created_at)) }}</a><strong class="pull-right">Views: {{ $viewers_count }} </strong></p>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                                <div class="row mt-0">
                                    <h5 class="col-md-5 ">{{ ucwords($post->title) }}</h5>
                                    <div class="offset-3"><a class=" pull-right" href="{{ route('category.show', $post->category_id) }}">{{ $post->category->cat_name }}</a></div>
                                </div>
                                
       
                            <div class="row justify-content-center">
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="single-blog-post post-style-3 mt-30 fadeInUpBig" data-wow-delay="0.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ $post->main_image }}" alt="">
                                            <!-- Post Content -->
   
                                        </div> 
                                    </div>
                                </div>
                            </div><br>
                            <h6>{!! $post->post_body !!}</h6>
                            <!-- Post Tags -->
                            Post Tags
                            <ul class="post-tags">
                                @foreach ($post->tags as $item)
                                    
                                <li><a href="{{ route('tag.show', $item->id) }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                                              {{-- //// //////// --}}
        
                            <div class="row justify-content-center">
                          @if(isset($post->other_images_show[0]))

                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[0]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif  
                          @if(isset($post->other_images_show[1]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.4s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[1]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[2]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.6s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[2]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[3]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.8s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[3]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[4]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="1s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[4]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[5]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="1.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[5]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>   
                          @endif
                          @if(isset($post->other_images_show[6]))                                
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[6]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[7]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.4s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[7]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[8]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.6s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[8]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[9]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="0.8s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[9]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[10]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="1s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[10]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>
                          @endif
                          @if(isset($post->other_images_show[11]))
                                <!-- ========== Single Blog Post ========== -->
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="single-blog-post post-style-3 mt-30 wow fadeInUpBig" data-wow-delay="1.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="{{ asset($post->other_images_show[11]) }}" alt="">
                                            <!-- Post Content -->
   
                                        </div>
                                    </div>
                                </div>   
                            </div>
                          @endif        
        
                            {{-- ///////////////// --}}

        
          
                        </div>
                    </div>
                </div>

                
            </div>




        </div>
    </div>
@include('user.partials.footer')