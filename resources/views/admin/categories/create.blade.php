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
      <li><a href=" {{ route('dashboard.category.index') }} ">Category</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section>
  <div class="box">
       
        
    <div class="box-header">
      <h3>@lang('site.add_category')</h3>
      @include('partials.errors')
    </div>  
    <div class="box-body">
      <form action=" {{ route('dashboard.category.store') }} " method="Post" >
        
        @csrf
        
        <div class="form-group">
          <label>@lang('site.category_name')</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
        </div>


          <div class="form-group">
              <input type="submit" value=" {{ __('site.add') }} " class="btn btn-primary m-2">
          </div>


      </form>
    </div>
  </div>
  

@stop