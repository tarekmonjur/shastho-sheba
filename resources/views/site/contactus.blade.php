@extends('site.layouts.layout')

@section('content')



<div class="about-area">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-6 text-left">

                <div class="sub-link about-sub-padd"><a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>Contact Us</div>

            </div>

        </div>



        <div class="row">

            <div class="col-md-12">

                <div class="about-img">

                    <img src="{{asset(config('setting.site_img'))}}/slide-1.jpg" alt="">

                </div>

            </div>

        </div>



        <div class="row about-text-row">

            <div class="col-md-9 mid-text-right-border">
                
                <h1>Your Contact Details</h1>

                <form class="login-form" method="post" action="">

                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="input" name="name" value="{{old('name')}}" placeholder="Enter Name...">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="input" name="email" value="{{old('email')}}" placeholder="Enter email...">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="input" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No... (0171....)">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="input" name="city" value="{{old('city')}}" placeholder="Enter city...">
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="input" name="address" value="{{old('address')}}" placeholder="Enter Address...">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <input type="text" class="input" name="state" value="{{old('state')}}" placeholder="Enter state...">
                            @if ($errors->has('state'))
                                <span class="text-danger">{{ $errors->first('state') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="input" style="height: 100px" name="message" value="{{old('message')}}" placeholder="message..."></textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>
                    
            
                    <div style="margin-top: 10px"></div>

                    <div class="col-md-6 padd-less-btn">

                        <button>Submit</button>

                    </div>

                </form>

            </div>

            <div class="col-md-3 text-center">

                <div class="terms-conditions-left">

                    <img src="{{asset(config('setting.site_img'))}}/terms-right-icon.png" alt="">

                    <p>Excellence, Expertise and Experience in Comprehensive Health Care.</p>

                </div>

            </div>
        </div>

    </div>

</div>



@endsection