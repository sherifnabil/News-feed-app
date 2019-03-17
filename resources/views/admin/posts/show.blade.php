@extends('partials.main') 
@section('content')
</aside>

<div class="content-wrapper">
    <section class="content-header">
        <h4>
            Dashboard
            <small>Control panel</small>
        </h4>
        <ol class="breadcrumb">
            <li><a href=" {{ route('dashboard.dashboard') }} "><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href=" {{ route('dashboard.subscription.index') }} ">Plans</a></li>
            <li class="active">View Plan</li>
        </ol>
    </section>
    <div class="box ">


        <div class="box-header">
            <h3>@lang('site.subscription_view') Plan: {{ $subscription->name }} </h3>
        </div>
        
        <div class="box-body">
            <div class="row">
                <div class="plans basic  col-md-12">
                    <div class="plan-inner">
                        <div class="entry-title">
                            <h3> {{ $subscription->name }}</h3>
                            <div class="price"> {{ $subscription->plan_price }} </span>
                            </div>
                        </div>
                        <div class="entry-content">
        
                            <div id="price">
                                <h3> <strong>@lang('site.notification_type') :</strong> {{ $subscription->notification_format }} </h3>
                            </div>
                            <div class="text-center myimg">
                                <img src="{{ $subscription->plan_img }}" style="width:450px; height:250px;">
                            </div>

                            <div class="text-center">
                                <h3> <strong>@lang('site.subscription_features')</strong> </h3>
                                </div>
                            </div>
                            <ul class="m-btm">
                                
                                @foreach ($subscription->features_as_feature as $feature)
                                    <li class="over"> <h4>{{'#- ' . $feature }}</h4> </li>
                                @endforeach

                            </ul>
                        </div>

                        
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>




@stop