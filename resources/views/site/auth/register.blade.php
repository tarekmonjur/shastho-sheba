@extends('site.layouts.layout')

@section('content')

    <div class="login-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="local-login-area">

                        <h1>Create New Account</h1>

                        <form class="login-form" method="post" action="{{url('/signup')}}">

                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="input" name="first_name" value="{{old('first_name')}}" placeholder="First Name...">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="input" name="last_name" value="{{old('last_name')}}" placeholder="Last Name...">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <input type="text" name="email" value="{{old('email')}}" placeholder="Email Address..">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            <input type="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                             <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="input" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No... (0171....)">
                                    @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="input" name="referrer_code" value="{{old('referrer_code')}}" placeholder="Referrer Code...">
                                    @if ($errors->has('referrer_code'))
                                        <span class="text-danger">{{ $errors->first('referrer_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="input" name="city" value="{{old('city')}}" placeholder="City...">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="input" name="address" value="{{old('address')}}" placeholder="Address...">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                    
                            <div style="margin-top: 10px"></div>

                            <div class="col-md-6 padd-less-btn">

                                <button>Create Account</button>

                                <a href="{{url('/login')}}" class="bg-less create">Log In</a>

                            </div>

                            <div class="col-md-6 padd-less-btn"><a href="{{url('/password/reset')}}">Forgot Your Password?</a></div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection