@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> <h2> {{ __('Register') }}</h2></div>
                @if ($errors->count() > 0)
                    @foreach ($errors->all() as $item)
                       {{ $item}}
                    @endforeach
                @endif

                <div class="card-body row">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2 class="text-center" >Choose Your Plan</h2>
                        <div id="price">
                            @if (isset($subscriptions[0]))                                        
                                <!--price tab-->
                                <div class="plan">
                                    <div class="plan-inner">
                                        <div class="entry-title">
                                            <h3>{{ $subscriptions[0]->name }}</h3>
                                            <div class="price">{{ $subscriptions[0]->plan_price }}
                                            </div>
                                        </div>
                                        <p>Notification Type: {{ $subscriptions[0]->notification_format }} </p>
                                        <div class="entry-content">
                                            <ul>
                                                @for ($i = 0, $ii=2; $i < $ii; $i++)
                                                    @if (isset($subscriptions[0]->features_as_feature[$i]))
                                                        <li><strong>{{ $i+1 }}#</strong> {{ $subscriptions[0]->features_as_feature[$i]  }}</li>
                                                    @endif      
                                                @endfor

                                            </ul>
                                        </div>
                                        <div class="btn">
                                        <input type="radio" name="subscription_id" value=" {{ $subscriptions[0]->id }} ">
                                        </div>
                                    </div>
                                </div>
                                <!-- end of price tab-->
                            @endif
                            @if (isset($subscriptions[1]))
                            <!--price tab-->
                            <div class="plan basic ">
                                <div class="plan-inner">
                                    <div class="entry-title">
                                        <h3>{{ $subscriptions[1]->name }}</h3>
                                        <div class="price">{{ $subscriptions[1]->plan_price }}
                                        </div>
                                    </div>
                                    <p>Notification Type: {{ $subscriptions[1]->notification_format }} </p>
                                    <div class="entry-content">
                                        <ul>
                                            @for ($i = 0, $ii=2; $i < $ii; $i++)
                                                @if (isset($subscriptions[1]->features_as_feature[$i]))
                                                    
                                                    <li><strong>{{ $i+1 }}#</strong> {{ $subscriptions[1]->features_as_feature[$i]  }}</li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="btn">
                                        <input type="radio" name="subscription_id" value=" {{ $subscriptions[1]->id }} ">
                                    </div>
                                </div>
                            </div>
                            <!-- end of price tab-->
                            @endif
                            @if (isset($subscriptions[2]))
                                <!--price tab-->
                                <div class="plan ultimite">
                                    <div class="plan-inner">
                                        <div class="entry-title">
                                            <h3>{{ $subscriptions[2]->name }}</h3>
                                            <div class="price">{{ $subscriptions[2]->plan_price }}
                                            </div>
                                        </div>
                                        <p>Notification Type: {{ $subscriptions[2]->notification_format }} </p>

                                        <div class="entry-content">
                                            <ul>
                                                @for ($i = 0, $ii=2; $i < $ii; $i++)            
                                                    @if (isset($subscriptions[2]->features_as_feature[$i]))
                                                        <li><strong>{{ $i+1 }}#</strong> {{ $subscriptions[2]->features_as_feature[$i]  }}</li>
                                                    @endif                                                
                                                @endfor
                                            
                                            </ul>
                                        </div>
                                        <div class="btn">
                                            <input type="radio" name="subscription_id" value=" {{ $subscriptions[2]->id }} ">
                                        </div>
                                    </div>
                                </div>
                                <!-- end of price tab-->
                            @endif
                        </div>                            
                        <br>
                        <div class="clear-fix"></div>

                        <div class="form-group row">

                            <div class="col-md-8 offset-md-2">
                                <input  type="text" placeholder="First Name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-8 offset-md-2">
                                <input  type="text" placeholder="Last Name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-8 offset-md-2">
                                <input placeholder="Your Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-8 offset-md-2">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-8 offset-md-2">
                                <input id="password-confirm" placeholder="Retype Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
