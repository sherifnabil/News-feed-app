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
      <li><a href=" {{ route('dashboard.admin.index') }} "><i class="fa fa-users"></i> Admin</a></li>
      <li class="active">Edit Admin</li>
    </ol>
  </section>
  <div class="box">
    <div class="row text-center">
       
      <div class="col-md-6 col-md-offset-3">
        
      </div>
    </div>
    <div class="box-header">
      <h3>@lang('site.edit_admin')</h3>
      @include('partials.errors')
    </div>  
    <div class="box-body">
      <form action="{{ route('dashboard.admin.update', $admin->id) }}"  method="post" enctype="multipart/form-data" >
        
        @csrf
        @method('put')
        <div class="form-group">
          <label>@lang('site.admin_name')</label>
          <input type="text" name="name" class="form-control" value="{{ $admin->name }}" >
        </div>

        <div class="form-group">
            <label>@lang('site.admin_email')</label>
            <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
        </div>

          <div class="form-group">
              <label>@lang('site.admin_password')</label>
              <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
              <label>@lang('site.super')</label>
              <input type="checkbox" name="is_super" {{ $admin->is_super ? 'checked' : '' }} >
          </div>

          <div class="form-group">
              <label>@lang('site.featured')</label>
              <input type="file" name="featured" class="image" >
          </div>
          <div class="form-group">
              <img src="{{ $admin->admin_profile }}" class="img-thumbnail image-preview" alt="" style="width:170px; height:150px">
          </div>


        

          <div class="form-group">
              <input type="submit" value=" {{ __('site.save') }} " class="btn btn-primary m-2">
          </div>


      </form>
    </div>
  </div>
  

@stop