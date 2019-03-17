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
      <li class="active">Edit Post</li>
    </ol>
  </section>
  <div class="box">


    <div class="box-header">
      <h3>@lang('site.add_post')</h3>
  @include('partials.errors')
    </div>
    <div class="box-body">
      <form action="{{ route('dashboard.post.update', $post) }}" method="post" enctype="multipart/form-data">

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
          <label>@lang('site.posted_by')</label>
          <select name="user_id" class="form-control">
            <option >............................</option>
              @foreach ($users as $user)
                  <option {{ $post->user_id == $user->id ? 'selected' :'' }} value="{{ $user->id }}">{{ $user->first_namee . ' ' .  $user->last_namee  }}</option>
              @endforeach
          </select>

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


  
@stop