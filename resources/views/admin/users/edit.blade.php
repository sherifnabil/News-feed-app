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
      <li><a href=" {{ route('dashboard.user.index') }} "><i class="fa fa-users"></i> User</a></li>
      <li class="active">Edit User</li>
    </ol>
  </section>
  <div class="box">


    <div class="box-header">
      <h3>@lang('site.edit_user')</h3>
  @include('partials.errors')
    </div>
    <div class="box-body">
      <form action=" {{ route('dashboard.user.update', [$user->id]) }} " method="Post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
          <label>@lang('site.user_first_name')</label>
          <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
        </div>

        <div class="form-group">
          <label>@lang('site.user_last_name')</label>
          <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>

        <div class="form-group">
          <label>@lang('site.user_email')</label>
          <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
          <label>@lang('site.user_password')</label>
          <input type="password" name="password" class="form-control">
        </div>


        <div class="form-group">
          <label>@lang('site.sub_plan')</label>
          <select name="subscription_id" class="form-control">
                <option >.........................</option>  
                  @foreach ($subscription as $sub)
                    <option {{ ($user->subscription_id == $sub->id) ? 'selected' : '' }} value="{{ $sub->id }}">{{ $sub->name }}</option>  
                  @endforeach
              </select>
        </div>

        <div class="form-group">
          <label>@lang('site.featured')</label>
          <input type="file" name="featured" class="image">
        </div>
        <div class="form-group">
          <img src="{{ $user->user_profile }}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
        </div>




        <div class="form-group">
          <input type="submit" value=" {{ __('site.save') }} " class="btn btn-primary m-2">
        </div>


      </form>
    </div>
  </div>


  
@stop