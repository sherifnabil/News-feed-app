@include('user.partials.header')
    @include('user.partials.nav')

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-600 bg-img background-overlay" style="background-image: url({{ url('world-front') }}/img/blog-img/bg2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- Catagory -->
                        <h3>Add Post</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">

                <!-- ============= Post Content Area ============= -->
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="single-blog-content mb-100">
                        
                        <form action=" {{ route('dashboard.post.store') }} " method="post" enctype="multipart/form-data">
                            
                                @csrf
                            
                                <div class="form-group">
                                    <label>@lang('site.post_title')</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                </div>
                            
                            
                                <div class="form-group">
                                    <label>@lang('site.post_body')</label>
                                    <textarea name="post_body" class="form-control ckeditor" cols="30" rows="10"> {{ old('post_body') }} </textarea>
                                </div>
                            
                            
                                <div class="form-group">
                                    <label>@lang('site.category')</label>
                                    <select name="category_id" class="form-control">
                                          
                                        <option >............................</option>
                                        @foreach ($categories as $category)
                                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                                          @endforeach
                                      </select>
                            
                                </div>
                            
                                <div class="form-group">
                                    <label>@lang('site.tags')</label>
                                    <div class="form-group-item">
                                        @if ($tags->count() > 0) @foreach ($tags as $tag)
                                        <input type="checkbox" name="tag_id[]" class="form*-control" value=" {{ $tag->id }} "> {{ $tag->name }} &nbsp;
                                        @endforeach @else
                                        <p>Please Add Some Tags</p>
                                        @endif
                                    </div>
                            
                                </div>
                            
                            
                                <div class="form-group">
                                    <label>@lang('site.post_featured')</label>
                                    <input type="file" name="featured" class=" form-control image">
                                </div>
                                <div class="form-group">
                                    <img src="{{ url('uploads/posts_icons/4.png')}}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
                                </div>
                            
                            
                                <div class="form-group">
                                    <label>@lang('site.post_other_images')</label>
                                    <input type="file" name="other_images[]" multiple="multiple" class=" form-control">
                                </div>
                            
                            
                            
                            
                                <div class="form-group">
                                    <input type="submit" value=" {{ __('site.add') }} " class="btn btn-primary m-2">
                                </div>
                            
                            
                            </form>
                    </div>
                </div>

                
            </div>




        </div>
    </div>
@include('user.partials.footer')