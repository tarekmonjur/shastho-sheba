@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/generics/view')}}">Manage Medicine Generics</a></li>
        <li class="active"><a href="#">Edit Medicine Generics</a></li>
        @if(canAccess("generics/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/generics/view')}}"> View Medicine Generics</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="post" action="{{url('generics/edit/'.$generic->id)}}">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('generic_name') ? ' has-error' : '' }}">
                                    <label for="generic_name">Generic Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="generic_name" value="{{ $generic->generic_name }}" placeholder="Enter generic name">
                                    @if ($errors->has('generic_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('generic_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('precaution') ? ' has-error' : '' }}">
                                    <label for="precaution">Precaution</label>
                                    <textarea class="form-control" name="precaution" placeholder="Enter precaution">{{ $generic->precaution }}</textarea>
                                    @if ($errors->has('precaution'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('precaution') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('indication') ? ' has-error' : '' }}">
                                    <label for="indication">Indication</label>
                                    <textarea class="form-control" name="indication" placeholder="Enter indication">{{ $generic->indication }}</textarea>
                                    @if ($errors->has('indication'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('indication') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('contraindication') ? ' has-error' : '' }}">
                                    <label for="contraindication">Contraindication</label>
                                    <textarea class="form-control" name="contraindication" placeholder="Enter contraindication">{{ $generic->contraindication }}</textarea>
                                    @if ($errors->has('contraindication'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('contraindication') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('dose') ? ' has-error' : '' }}">
                                    <label for="dose">Dose</label>
                                    <textarea class="form-control" name="dose" placeholder="Enter dose">{{ $generic->dose }}</textarea>
                                    @if ($errors->has('dose'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dose') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('side_effect') ? ' has-error' : '' }}">
                                    <label for="side_effect">Side Effect</label>
                                    <textarea class="form-control" name="side_effect" placeholder="Enter side_effect">{{ $generic->side_effect }}</textarea>
                                    @if ($errors->has('side_effect'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('side_effect') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('mode_of_action') ? ' has-error' : '' }}">
                                    <label for="mode_of_action">Mode of Action</label>
                                    <textarea class="form-control" name="mode_of_action" placeholder="Enter mode of action">{{ $generic->mode_of_action }}</textarea>
                                    @if ($errors->has('mode_of_action'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mode_of_action') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('interaction') ? ' has-error' : '' }}">
                                    <label for="interaction">Interaction</label>
                                    <textarea class="form-control" name="interaction" placeholder="Enter interaction">{{ $generic->interaction }}</textarea>
                                    @if ($errors->has('interaction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('interaction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Generic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection