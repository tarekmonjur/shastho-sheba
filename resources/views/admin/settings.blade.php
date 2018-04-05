@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('admin/settings')}}">Manage Settings</a></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="post" action="{{url('admin/settings')}}">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('notification_email') ? ' has-error' : '' }}">
                                    <label for="notification_email">Notification Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="notification_email" value="{{ (old('notification_email'))?:$settings->notification_email }}" placeholder="Enter notification_email address">
                                    @if ($errors->has('notification_email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('notification_email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('referral_bonus') ? ' has-error' : '' }}">
                                    <label for="referral_bonus">Referral Bonus <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="referral_bonus" value="{{ (old('referral_bonus'))?:$settings->referral_bonus }}" placeholder="Enter Referral Bonus">
                                    @if ($errors->has('referral_bonus'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('referral_bonus') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('delivery_fee') ? ' has-error' : '' }}">
                                    <label for="delivery_fee">Delivery Fee <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="delivery_fee" value="{{ (old('delivery_fee'))?:$settings->delivery_fee }}" placeholder="Enter Delivery Fee">
                                    @if ($errors->has('delivery_fee'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('delivery_fee') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('processing_fee') ? ' has-error' : '' }}">
                                    <label for="processing_fee">Processing Fee <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="processing_fee" value="{{ (old('processing_fee'))?:$settings->processing_fee }}" placeholder="Enter Processing Fee">
                                    @if ($errors->has('processing_fee'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('processing_fee') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection