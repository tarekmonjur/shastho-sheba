@extends('site.layouts.layout')

@section('content')

<div class="login-area">

  <div class="container container-custom">

      <div class="row">

          <div class="col-md-6">

              <div class="local-login-area">

                  <h1>Order Shipping Information</h1>

                  <div class="login-text">

                      <span>Shipping Information</span>

                  </div>

                  <form class="login-form" method="post" action="{{url('/shipping')}}">

                      {{csrf_field()}}

                       <input type="text" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Mobile No..">
                        @if ($errors->has('mobile_no'))
                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                        @endif

                       <input type="text" name="city" value="{{old('city')}}" placeholder="Enter City..">
                        @if ($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        @endif

                       <input type="text" name="address" value="{{old('address')}}" placeholder="Enter Address..">
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif

                      <div style="margin-top: 10px"></div>

                      <div class="col-md-6 padd-less-btn">

                          <button type="submit" name="shipping">Submit</button>

                      </div>

                  </form>

              </div>

          </div>

      </div>

  </div>

</div>







@endsection