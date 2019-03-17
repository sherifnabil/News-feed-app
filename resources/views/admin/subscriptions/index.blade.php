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
        <li class="active"> @lang('site.subscriptions') </li>
      </ol>
    </section> 
    
    <div class="box margin-top ">
      <div class="box-header">
        <h3 class="box-title">{{ 'subscriptions' }}</h3>
        <small> <strong>{{ $subscriptions->count() }} </strong> </small>
        <br>        <br>        
          <div class="form-group">
            <form action="{{ route('dashboard.subscription.index') }}" method="get"  >
              <div class="row">
                <div class="col-md-4">
                  <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="@lang('site.search_subscription')" >
                </div>
                <button type="submit" class="btn btn-md btn-warning "><i class="fa fa-search"></i> @lang('site.search') </button>
                <a href="{{ route('dashboard.subscription.create') }}" class="btn btn-primary"> <i class="fa fa-plus"> @lang('site.new')</i> </a>
              </div>
            </form>
          </div>
          </div>
          
        @if ($subscriptions->count() > 0)
            
        <div class="box-body">
          <table  class="table table-bordered table-hover">
            <thead  >                  
              <tr class="text-center">
                <th class="text-center" >#</th>
                <th class="text-center" >@lang('site.subscription_name')</th>
                <th class="text-center" >@lang('site.icon')</th>
                <th class="text-center" >@lang('site.notification_type')</th>
                <th class="text-center" >@lang('site.subscription_price')</th>
                <th class="text-center" >@lang('site.subscription_some_features')</th>
                <th class="text-center" >@lang('site.edit')</th>
                <th class="text-center" >@lang('site.delete')</th>
                <th class="text-center" >@lang('site.subscription_view')</th>
              </tr>
            </thead>
              <tbody>
                @foreach ($subscriptions as $subscription)
                  <tr>  
                    <td class="text-center" > {{ $subscription->id }} </td>
                    <td class="text-center" > {{ $subscription->name}} </td>   
                    <td class="text-center" > <img src="{{ $subscription->plan_img }}" style="width=70px; height:50px"> </td>
                    <td class="text-center" > {{ $subscription->notification_format }} </td>
                    <td class="text-center" > {{ $subscription->plan_price }}</td>
                    <td class="text-center" >
                      <ul class="list-unstyled">
                        @for ($i = 0, $ii = 2; $i < $ii; $i++)

                          <li> 
                            {!!  
                                '<span class="pull-left"> # - </span><span class="text-center">' .
                           (strlen($subscription->features_as_feature[$i]) >= 40 
                              ? substr($subscription->features_as_feature[($i)], 0,  35) . ' .........' 
                              :$subscription->features_as_feature[$i]) . '</span>'
                            !!} 
                          </li>
                        
                        @endfor
                      </ul class="list-unstyled">
                    </td>

                    <td class="text-center" > <a href=" {{ route('dashboard.subscription.edit', $subscription->id) }} " class="btn btn-sm btn-info"> <i class="fa fa-edit"></i> @lang('site.edit')</a> </td>
                    <td class="text-center">
                      <form action="{{ route('dashboard.subscription.destroy', $subscription->id) }}" method="post" >
                        {{ csrf_field() }} 
                        {{ method_field('delete') }}
                         <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> @lang('site.delete')</button> 
                        </form>
                      </td>
                    <td class="text-center" > <a href=" {{ route('dashboard.subscription.show', $subscription->id) }} " class="btn btn-sm btn-default"> <i class="fa fa-eye"></i> @lang('site.subscription_view')</a></td>
                  </tr>
                @endforeach
                
              </tbody>
          </table>
          {{ $subscriptions->appends(request()->query())->links() }}        
        </div>
      @else
        <h2 class="text-center" >@lang('site.no_data_found')</h2> <br>
      @endif




      


      @stop