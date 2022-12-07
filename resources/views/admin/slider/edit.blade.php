@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/sliders/view')}}">Manage Sliders</a></li>
        <li class="active"><a href="#">Edit Slider</a></li>
        @if(canAccess("sliders/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('sliders/view')}}"> View Sliders</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('sliders/edit/'.$slider->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('slider_title') ? ' has-error' : '' }}">
                                    <label for="slider_title">Slider Title </label>
                                    <input type="text" class="form-control" name="slider_title" value="{{ $slider->slider_title }}" placeholder="Enter Slider Title...">
                                    @if ($errors->has('slider_title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slider_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('slider_url') ? ' has-error' : '' }}">
                                    <label for="slider_url">Slider Url </label>
                                    <input type="text" class="form-control" name="slider_url" value="{{ $slider->slider_url }}" placeholder="Enter Slider Url...">
                                    @if ($errors->has('slider_url'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slider_url') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('slider_description') ? ' has-error' : '' }}">
                                    <label for="slider_description">Slider Description </label>
                                    <textarea id="slider_description" class="form-control" name="slider_description" placeholder="Enter Slider Description">{{ $slider->slider_description }}</textarea>
                                    @if ($errors->has('slider_description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slider_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('slider_status') ? ' has-error' : '' }}">
                                    <label for="slider_status">Slider Status <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="slider_status" value="active" class="flat-green" @if($slider->slider_status == 'active') checked @endif>
                                        <strong>Active</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="slider_status" value="inactive" class="flat-red" @if($slider->slider_status == 'inactive') checked @endif>
                                        <strong>Inactive</strong>
                                    </div>
                                    @if ($errors->has('slider_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slider_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('slider_image') ? ' has-error' : '' }}">
                                    <label for="slider_image">Slider Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="slider_image">
                                    @if ($errors->has('slider_image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('slider_image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{$slider->mediumPhoto}}">
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
