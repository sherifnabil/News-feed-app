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
      <li><a href=" {{ route('dashboard.subscription.index') }} ">Plans</a></li>
      <li class="active">Edit Plan</li>
    </ol>
  </section>
  <div class="box">


    <div class="box-header">
      <h3>@lang('site.edit_subscription')</h3>
  @include('partials.errors')
    </div>
    <div class="box-body">
      <form action=" {{ route('dashboard.subscription.update', $subscription->id) }} " method="Post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
          <label>@lang('site.subscription_name')</label>
          <input type="text" name="name" class="form-control" value="{{$subscription->name }}">
        </div>

        <div class="form-group">
          <label>@lang('site.subscription_features')</label>


          @if(count($subscription->features_as_feature) <= 6)
                <div class="row">
                      <div class="col-md-4">
                        <input class="form-control" value="{{ isset($subscription->features_as_feature[0], $subscription->features_as_feature) ? $subscription->features_as_feature[0] : '' }}" type="text" name="features[]" placeholder="Feature 1">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[1], $subscription->features_as_feature) ? $subscription->features_as_feature[1] : '' }}" placeholder="Feature 2">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[2], $subscription->features_as_feature) ? $subscription->features_as_feature[2] : '' }}" placeholder="Feature 3">
                      </div>
                    </div>
                  <div class="row m-2">
                    <div class="col-md-4 form-group-item">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[3], $subscription->features_as_feature) ? $subscription->features_as_feature[3] : '' }}"  placeholder="Feature 4">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[4], $subscription->features_as_feature) ? $subscription->features_as_feature[4] : '' }}"  placeholder="Feature 5">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[5], $subscription->features_as_feature) ? $subscription->features_as_feature[5] : '' }}"  placeholder="Feature 6">
                    </div>
                  </div>

          @else
          
          <div class="row">
                      <div class="col-md-4">
                        <input class="form-control" value="{{ isset($subscription->features_as_feature[0], $subscription->features_as_feature) ? $subscription->features_as_feature[0] : '' }}" type="text" name="features[]" placeholder="Feature 1">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[1], $subscription->features_as_feature) ? $subscription->features_as_feature[1] : '' }}" placeholder="Feature 2">
                      </div>
                      <div class="col-md-4">
                        <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[2], $subscription->features_as_feature) ? $subscription->features_as_feature[2] : '' }}" placeholder="Feature 3">
                      </div>
                    </div>
                  <div class="row m-2">
                    <div class="col-md-4 form-group-item">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[3], $subscription->features_as_feature) ? $subscription->features_as_feature[3] : '' }}"  placeholder="Feature 4">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[4], $subscription->features_as_feature) ? $subscription->features_as_feature[4] : '' }}"  placeholder="Feature 5">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[5], $subscription->features_as_feature) ? $subscription->features_as_feature[5] : '' }}"  placeholder="Feature 6">
                    </div>
                  </div>

                  <div class="row m-2">
                    <div class="col-md-4 form-group-item">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[6], $subscription->features_as_feature) ? $subscription->features_as_feature[6] : '' }}"  placeholder="Feature 7">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[7], $subscription->features_as_feature) ? $subscription->features_as_feature[7] : '' }}"  placeholder="Feature 8">
                    </div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="features[]" value="{{ isset($subscription->features_as_feature[7], $subscription->features_as_feature) ? $subscription->features_as_feature[7] : '' }}"  placeholder="Feature 9">
                    </div> <h1>end</h1>
                  </div>

          @endif



        </div>

        <div class="form-group">
          <label>@lang('site.notification_type')</label>
          <select name="notification_type" class="form-control">
                <option >...........................</option>
                <option {{$subscription->notification_type == 'no_notification' ? 'selected' : '' }} value="no_notification">@lang('site.no_notification')</option>
                <option {{$subscription->notification_type == 'email_notification' ? 'selected' : '' }} value="email_notification">@lang('site.email_notification')</option>
                <option {{$subscription->notification_type == 'in_site_notification' ? 'selected' : '' }}  value="in_site_notification">@lang('site.in_site_notification')</option>
                <option {{$subscription->notification_type == 'both' ? 'selected' : '' }} value="both">@lang('site.both')</option>
              </select>
        </div>

        <div class="form-group">
          <label>@lang('site.subscription_price')</label>
          <input type="number" name="price" class="form-control" value="{{$subscription->price }}">
        </div>

        <div class="form-group">
          <label>@lang('site.subscription_icon')</label>
          <input type="file" name="icon" class="image">
        </div>
        <div class="form-group">
          <img src="{{ $subscription->plan_img }}" class="img-thumbnail image-preview" alt="" style="width:150px; height:100px">
        </div>




        <div class="form-group">
          <input type="submit" value=" {{ __('site.save') }} " class="btn btn-primary m-2">
        </div>


      </form>
    </div>
  </div>


  
@stop