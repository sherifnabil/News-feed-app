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
      <li><a href=" {{ route('dashboard.subscription.index') }} "><i class="fa fa-users"></i> Plan</a></li>
      <li class="active">Add Plan</li>
    </ol>
  </section>
  <div class="box">
       
        
    <div class="box-header">
      <h3>@lang('site.add_subscription')</h3>
      @include('partials.errors')
    </div>  
    <div class="box-body">
      <form action=" {{ route('dashboard.subscription.store') }} " method="Post" enctype="multipart/form-data" >
        
        @csrf
        
        <div class="form-group">
          <label>@lang('site.subscription_name')</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
        </div>

        <div class="form-group">
            <label>@lang('site.subscription_features')</label>
           <div class="row">
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]"  placeholder="Feature 1" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 2" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 3" >
              </div>
            </div>
            <div class="row m-2">
              <div class="col-md-4 form-group-item">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 4" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 5" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 6" >
              </div>
            </div>
            <div class="row m-2">
              <div class="col-md-4 form-group-item">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 7" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 8" >
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="features[]" placeholder="Feature 9" >
              </div>
            </div>
        </div>

          <div class="form-group">
              <label>@lang('site.notification_type')</label>
              <select name="notification_type" class="form-control"  >
                <option >...........................</option>
                <option {{ old('notification_type') == 'no_notification' ? 'selected' : '' }} value="no_notification">@lang('site.no_notification')</option>
                <option {{ old('notification_type') == 'email_notification' ? 'selected' : '' }} value="email_notification">@lang('site.email_notification')</option>
                <option {{ old('notification_type') == 'in_site_notification' ? 'selected' : '' }}  value="in_site_notification">@lang('site.in_site_notification')</option>
                <option {{ old('notification_type') == 'both' ? 'selected' : '' }} value="both">@lang('site.both')</option>
              </select>
          </div>

        <div class="form-group">
            <label>@lang('site.subscription_price')</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        </div>

          <div class="form-group">
              <label>@lang('site.subscription_icon')</label>
              <input type="file" name="icon" class="image" >
          </div>
          <div class="form-group">
              <img src="{{ url('uploads/subscriptions_icons/4.png')}}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
          </div>


        

          <div class="form-group">
              <input type="submit" value=" {{ __('site.add') }} " class="btn btn-primary m-2">
          </div>


      </form>
    </div>
  </div>
  

@stop