@extends('site.layouts.layout')

@section('content')



    <div class="login-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="local-login-area">

                        <h1>Reset Password</h1>



                        <form class="login-form" method="post" action="{{url('/password/reset')}}">

                            {{csrf_field()}}

                            <input type="hidden" name="token" value="{{$token}}">

                            <input type="text" name="email" value="{{$email}}" placeholder="Email...">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            <input type="password" name="password" placeholder="New Password...">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                            <input type="password" name="password_confirmation" placeholder="Confirmed Password">

                            <div style="margin-top: 10px"></div>

                            <div class="col-md-6 padd-less-btn">

                                <button>Reset</button>
                            </div>

                            <div class="col-md-6 padd-less-btn"><a href="{{url('/login')}}">Login?</a></div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection