@extends('site.layouts.layout')

@section('content')



    <div class="login-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="local-login-area">

                        <h1>Retrieve Your Password</h1>

                        <div class="login-text">

                            <span>Please enter your E-mail ID and we will send a link to your registered E-mail ID to reset your password.</span>

                        </div>

                        <form class="login-form" method="post" action="{{url('password/email')}}">

                            {{csrf_field()}}

                            <input type="text" name="email" placeholder="Email address">

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            <div style="margin-top: 10px"></div>

                            <div class="col-md-6 padd-less-btn">

                                <button>Send Reset Password Link</button>

                            </div>

                            <div class="col-md-6 padd-less-btn"><a href="{{url('/login')}}">Log In?</a></div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection