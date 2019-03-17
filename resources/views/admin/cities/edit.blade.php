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
      <li><a href=" {{ route('dashboard.city.index') }} "> @lang('site.city')</a></li>
      <li class="active">Edit city</li>
    </ol>
  </section>
  <div class="box">
    <div class="row text-center">
       
      <div class="col-md-6 col-md-offset-3">
        
      </div>
    </div>
    <div class="box-header">
      <h3>@lang('site.edit_city')</h3>
      @include('partials.errors')
    </div>  
    <div class="box-body">
      <form action="{{ route('dashboard.city.update', $city->id) }}"  method="post" enctype="multipart/form-data" >
        
        @csrf
        @method('put')
        <div class="form-group">
          <label>@lang('site.city_name')</label>
          <input type="text" name="name" class="form-control" value="{{ $city->name }}" >
        </div>
        <div class="form-group">
          <label>@lang('site.country')</label>
          <select name="country_id" class="form-control">
            <option>.....................</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == $city->country_id ? 'selected' : '' }}  > {{ $country->name }} </option>
            @endforeach
          </select>
        </div>

          <div class="form-group">
              <input type="submit" value=" {{ __('site.save') }} " class="btn btn-primary m-2">
          </div>


      </form>
    </div>
  </div>
  

@stop