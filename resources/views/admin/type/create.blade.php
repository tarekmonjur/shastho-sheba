@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/types/view')}}">Manage Medicine Types</a></li>
        <li class="active"><a href="#">Create Medicine Type</a></li>
        @if(canAccess("types/view"))
        <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('types/view')}}"> View Medicine Types</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('types/create')}}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('medicine_type_name') ? ' has-error' : '' }}">
                                    <label for="medicine_type_name">Medicine Type Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="medicine_type_name" value="{{ old('medicine_type_name') }}" placeholder="Enter Medicine Type Name">
                                    @if ($errors->has('medicine_type_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('medicine_type_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create Medicine Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
