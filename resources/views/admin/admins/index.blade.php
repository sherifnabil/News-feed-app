@extends('partials.main')
@section('content')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=" {{ route('dashboard.dashboard') }} "><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> @lang('site.admins') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title">{{ 'Admins' }}</h3>
        <small> <strong>{{ $admins->count() }} </strong> </small>
        <br>        <br>        
          <div class="form-group">
            <form action="{{ route('dashboard.admin.index') }}" method="get"  >
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search_admin')" >
                </div>
                <button type="submit" class="btn btn-md btn-warning "><i class="fa fa-search"></i> @lang('site.search') </button>
                <a href="{{ route('dashboard.admin.create') }}" class="btn btn-primary"> <i class="fa fa-plus"> @lang('site.new')</i> </a>
              </div>
            </form>
          </div>
          </div>
          
        @if ($admins->count() > 0)
            
        <div class="box-body">
          <table  class="table table-bordered table-hover">
            <thead  >                  
              <tr class="text-center">
                <th class="text-center" >#</th>
                <th class="text-center" >@lang('site.admin_name')</th>
                <th class="text-center" >@lang('site.featured')</th>
                <th class="text-center" >@lang('site.admin_email')</th>
                <th class="text-center" >@lang('site.super')</th>
                <th class="text-center" >@lang('site.added_at')</th>
                <th class="text-center" >@lang('site.edit')</th>
                <th class="text-center" >@lang('site.delete')</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($admins as $admin)
                  <tr>  
                    <td class="text-center" > {{ $admin->id }} </td>
                    <td class="text-center" > {{ $admin->admin_name}} </td>   
                    <td class="text-center" > <img src="{{ $admin->admin_profile }}" alt="{{ $admin->admin_name}}" style="width=70px; height:50px"> </td>
                    <td class="text-center" > {{ $admin->email }} </td>
                    <td class="text-center" > {{ $admin->is_super == true ? 'Super Admin' : 'Normal Admin' }} </td>
                    <td class="text-center" > {{ date("d-m-Y", strtotime($admin->created_at)) }} </td>

                    <td class="text-center" > <a href=" {{ route('dashboard.admin.edit', $admin->id) }} " class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> @lang('site.edit')</a> </td>
                    <td class="text-center">
                      <form action="{{ route('dashboard.admin.destroy', $admin->id) }}" method="post" >
                        {{ csrf_field() }} 
                        {{ method_field('delete') }}
                         <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> @lang('site.delete')</button> 
                        </form>
                      </td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
          {{ $admins->appends(request()->query())->links() }}        
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop