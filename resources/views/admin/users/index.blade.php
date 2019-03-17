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
        <li class="active"> @lang('site.users') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title">{{ 'Users' }}</h3>
        <small> <strong>{{ $users->count() }} </strong> </small>
        <br>        <br>        
          <div class="form-group">
            <form action="{{ route('dashboard.user.index') }}" method="get"  >
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search_user')" >
                </div>
                <button type="submit" class="btn btn-md btn-warning "><i class="fa fa-search"></i> @lang('site.search') </button>
                <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary"> <i class="fa fa-plus"> @lang('site.new')</i> </a>
              </div>
            </form>
          </div>
          </div>
          
        @if ($users->count() > 0)
            
        <div class="box-body">
          <table  class="table table-bordered table-hover">
            <thead  >                  
              <tr class="text-center">
                <th class="text-center" >#</th>
                <th class="text-center" >@lang('site.user_first_name')</th>
                <th class="text-center" >@lang('site.user_last_name')</th>
                <th class="text-center" >@lang('site.featured')</th>
                <th class="text-center" >@lang('site.user_email')</th>
                <th class="text-center" >@lang('site.sub_plan')</th>
                <th class="text-center" >@lang('site.added_at')</th>
                <th class="text-center" >@lang('site.edit')</th>
                <th class="text-center" >@lang('site.delete')</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($users as $user)
                    <td class="text-center" > {{ $user->id }} </td>
                    <td class="text-center" > {{ $user->first_namee}} </td>   
                    <td class="text-center" > {{ $user->last_namee}} </td>   
                    <td class="text-center" > <img src="{{ $user->user_profile }}"  style="width=70px; height:50px"> </td>
                    <td class="text-center" > {{ $user->email }} </td>
                    <td class="text-center" > {{ $user->subscription->name }} </td>
                    <td class="text-center" > {{ date("d-m-Y", strtotime($user->created_at)) }} </td>

                    <td class="text-center" > <a href=" {{ route('dashboard.user.edit', $user->id) }} " class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> @lang('site.edit')</a> </td>
                    <td class="text-center">
                      <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="post" >
                        {{ csrf_field() }} 
                        {{ method_field('delete') }}
                         <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> @lang('site.delete')</button> 
                        </form>
                      </td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
          {{ $users->appends(request()->query())->links() }}        
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop