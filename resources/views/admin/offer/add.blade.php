@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/offers/view')}}">Manage Offers</a></li>
        <li class="active"><a href="#">Add Offer</a></li>
        @if(canAccess("offers/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('offers/view')}}"> View Offers</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('offers/add')}}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('offer_name') ? ' has-error' : '' }}">
                                    <label for="offer_name">Offer Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="offer_name" value="{{old('offer_name')}}" placeholder="Enter Offer Name..">
                                    @if($errors->has('offer_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_name') ? ' has-error' : '' }}">
                                    <label for="medicine_name">Medicine Name <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="medicine_name[]" multiple>
                                        <option value="">--- Select Medicine Name ---</option>
                                        @foreach($medicines as $medicine)
                                        <option value="{{$medicine->id}}" @if(old('medicine_name') == $medicine->id) selected @endif>{{$medicine->medicine_name}} ( {{$medicine->medicine_code}} )</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('medicine_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('offer_percent') ? ' has-error' : '' }}">
                                    <label for="offer_percent">Offer Percent <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="offer_percent" value="{{ old('offer_percent') }}" placeholder="Enter offer percent">
                                    @if ($errors->has('offer_percent'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_percent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('offer_start_date') ? ' has-error' : '' }}">
                                    <label for="offer_start_date">Offer Start Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker" name="offer_start_date" value="{{ old('offer_start_date') }}" placeholder="Enter offer start date">
                                    @if ($errors->has('offer_start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('offer_end_date') ? ' has-error' : '' }}">
                                    <label for="offer_end_date">Offer End Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datepicker" name="offer_end_date" value="{{ old('offer_end_date') }}" placeholder="Enter offer end date">
                                    @if ($errors->has('offer_end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('offer_highlight') ? ' has-error' : '' }}">
                                    <label for="offer_highlight">Is Highlight on Product? <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="offer_highlight" value="yes" class="flat-green" checked>
                                        <strong>Yse Highlight</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="offer_highlight" value="no" class="flat-red">
                                        <strong>Not Highlight</strong>
                                    </div>
                                    @if ($errors->has('offer_highlight'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_highlight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('offer_status') ? ' has-error' : '' }}">
                                    <label for="offer_status">Offer Status <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="offer_status" value="running" class="flat-green" checked>
                                        <strong>Running</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="offer_status" value="end" class="flat-red">
                                        <strong>End</strong>
                                    </div>
                                    @if ($errors->has('offer_status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('offer_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add Offer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
