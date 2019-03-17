@extends('partials.main')
@section('content')
</aside>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Dashboard
      <small>Control panel</small>
    </h4>
    <ol class="breadcrumb">
        <li><a href=" {{ route('dashboard.dashboard') }} "><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href=" {{ route('dashboard.post.index') }} "><i class="fa fa-users"></i> Posts</a></li>
      <li class="active">Add Post</li>
    </ol>
  </section>
  <div class="box">
       
        
    <div class="box-header">
      <h3>@lang('site.add_post')</h3>
      @include('partials.errors')
    </div>  
    <div class="box-body">
      <form action=" {{ route('dashboard.post.store') }} " method="post" enctype="multipart/form-data" >
        
        @csrf
        
        <div class="form-group">
          <label>@lang('site.post_title')</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" >
        </div>

                
        <div class="form-group">
          <label>@lang('site.post_body')</label>
         <textarea name="post_body" class="form-control ckeditor" cols="30" rows="10"> {{ old('post_body') }} </textarea>
        </div>

                        
        <div class="form-group">
          <label>@lang('site.posted_by')</label>
          <select name="user_id" class="form-control" >
            <option >............................</option>
              @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_namee . ' ' .  $user->last_namee  }}</option>
              @endforeach
          </select>

        </div>

        <div class="form-group">
          <label>@lang('site.category')</label>
          <select name="category_id" class="form-control" >
              
            <option >............................</option>
            @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>

        </div>

        <div class="form-group">
          <label>@lang('site.tags')</label>   
          <div class="form-group-item">
            @if ($tags->count() > 0)
          
              @foreach ($tags as $tag)
                <input type="checkbox" name="tag_id[]" class="form*-control" value=" {{ $tag->id }} "> {{ $tag->name }} &nbsp;
              @endforeach
            @else
              <p>Please Add Some Tags</p>
            @endif
          </div>

        </div>


        <div class="form-group">
            <label>@lang('site.post_featured')</label>
            <input type="file" name="featured" class=" form-control image" >
        </div>
        <div class="form-group">
            <img src="{{ url('uploads/posts_icons/4.png')}}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
        </div>


        <div class="form-group">
            <label>@lang('site.post_other_images')</label>
            <input type="file" name="other_images[]" multiple="multiple" class=" form-control" >
        </div>


        

          <div class="form-group">
              <input type="submit" value=" {{ __('site.add') }} " class="btn btn-primary m-2">
          </div>


      </form>
    </div>
  </div>
  

@stop