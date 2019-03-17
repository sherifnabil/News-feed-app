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
                                            <a href="{{ route('post.show', $recent->id) }}" class="headline">
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
                                            <a href="{{ route('post.show', $recent->id) }}" class="headline">
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
                                            <a href="{{ route('post.show', $recent->id) }}" class="headline">
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
      <form action="{{ route('dashboard.post.update', $post->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group">
          <label>@lang('site.post_title')</label>
          <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>


        <div class="form-group">
          <label>@lang('site.post_body')</label>
          <textarea name="post_body" class="form-control ckeditor" cols="30" rows="10"> {{ $post->post_body }} </textarea>
        </div>


        <div class="form-group">
          <label>@lang('site.category')</label>
          <select name="category_id" class="form-control">
              
            <option >............................</option>
            @foreach ($categories as $category)
                  <option {{ $post->category_id == $category->id ? 'selected' :'' }} value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>

        </div>
        
        <div class="form-group">
          <label>@lang('site.tags')</label>
          <div class="form-group-item">
              @foreach ($tags as $tag)

                <input type="checkbox" 
                  name="tag_id[]"  
                    @foreach ($post->tags as $item)
                      {{ $tag->id == $item->id ? 'checked' : '' }}
                      
                    @endforeach
                  value=" {{ $tag->id }} "> {{ $tag->name }} &nbsp;
              @endforeach 
          </div>

        </div>

        <br>
        <div class="form-group">
          <label>@lang('site.post_featured')</label>
          <input type="file" name="featured" class=" form-control image">
        </div>
        <div class="form-group">
          <img src="{{ $post->main_image }}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
        </div>


        <div class="">
          <label>@lang('site.post_other_images')</label>
          <input type="file" name="other_images[]" multiple="multiple" class=" form-control">
        </div>
        <br>
        @if (count($post->other_images_show) <= 4)
            
          <div class="row">          
            @foreach ($post->other_images_show as $img)
              <div class="col-md-3">

                <img src="{{ asset($img)}}" class="form-control " alt="" style=" height:150px">
              </div>
            @endforeach
          </div>
        @else

        <div class="row">
          @if(isset($post->other_images_show[0]))
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[0]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[1]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[1]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[2]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[2]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[3]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[3]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif                                   
 
        </div>
        <br>

        <div class="row">
          @if(isset($post->other_images_show[4]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[4]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[5]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[5]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[6]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[6]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[7]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[7]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif                                   
 
        </div>

        <br>
        <div class="row">
          @if(isset($post->other_images_show[8]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[8]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[9]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[9]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[10]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[10]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif
          @if(isset($post->other_images_show[11]))
        
            <div class="col-md-3">
              <img src="{{  asset($post->other_images_show[11]) }}" class="form-control " alt=""
                style=" height:150px">
            </div>
          @endif                                   
 
        </div>

        @endif

        <div class="form-group">
          <input type="submit" value=" {{ __('site.save') }} " class="btn btn-primary m-2">
        </div>


      </form>
                    </div>
                </div>

                
            </div>




        </div>
    </div>


    {{-- ckeditor plugin --}}
        <script src="{{ url('adminlte') }}/plugins/ckeditor/ckeditor.js"></script>
@include('user.partials.footer')