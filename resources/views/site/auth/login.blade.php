@extends('site.layouts.layout')

@section('content')



<div class="login-area">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-6">

                <div class="local-login-area">

                    <h1>Customer Login</h1>

                    <div class="login-text">

                        <span>Registered Customers</span>

                    </div>

                    <form class="login-form" method="post" @if(Request::has('redirect')) action="{{url('/login/?redirect='.Request::get('redirect'))}}" @else action="{{url('/login')}}" @endif>

                        {{csrf_field()}}

                        <input type="text" name="email_mobile" value="{{old('email_mobile')}}" placeholder="Email/Mobile">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        @if ($errors->has('mobile_no'))
                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                        @endif
                        @if ($errors->has('email_mobile'))
                            <span class="text-danger">{{ $errors->first('email_mobile') }}</span>
                        @endif

                        <input type="password" name="password" placeholder="Password">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                        <div style="margin-top: 10px"></div>

                        <div class="col-md-6 padd-less-btn">

                            <button>Log in</button>

                            <a href="{{url('/signup')}}" class="bg-less create">Create New Account</a>

                        </div>

                        <div class="col-md-6 padd-less-btn"><a href="{{url('/password/reset')}}">Forgot Your Password?</a></div>

                    </form>

                </div>

            </div>

            <div class="col-md-6">

                <div class="social-login-area">

                    <div class="login-text">

                        <span>Or Sign In With</span>

                    </div>

                    <div class="login-social">

                        <a href="{{url('facebook')}}" class="span"><i class="fa fa-facebook"></i> sign in with in facebook</a>

                        <a href="{{url('google')}}" class="span bg-google"><i class="fa fa-google"></i> Sign in with Google</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection