@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('admins')}}">Manage Admins</a></li>
        <li class="active"><a href="#">Edit Admin</a></li>
        @if(canAccess("admins/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/admins/view')}}">View Admins</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="post" action="{{url('admins/edit/'.$admin->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" value="{{ (old('first_name'))?:$admin->first_name}}" placeholder="Enter first name">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" value="{{ (old('last_name'))?:$admin->last_name }}" placeholder="Enter last name">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('designation') ? ' has-error' : '' }}">
                                    <label for="designation">Designation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="designation" value="{{ (old('designation'))?:$admin->designation }}" placeholder="Enter designation">
                                    @if ($errors->has('designation'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('role_id') ? ' has-error' : '' }}">
                                    <label for="role_id">Role/Level <span class="text-danger">*</span></label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">--- Select Role ---</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($admin->role_id == $role->id) selected @endif>{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('mobile_no') ? ' has-error' : '' }}">
                                    <label for="mobile_no">Mobile No <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mobile_no" value="{{ (old('mobile_no'))?:$admin->mobile_no }}" autofocus placeholder="Enter mobile no">
                                    @if ($errors->has('mobile_no'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('mobile_no') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <label for="male">Male : </label>
                                        <input type="radio" class="flat-red" name="gender" value="male" @if($admin->gender == 'male') checked @endif >
                                        <label for="female">Female : </label>
                                        <input type="radio" class="flat-red" name="gender" value="female" @if($admin->gender == 'female') checked @endif>
                                    </div>

                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ (old('email'))?:$admin->email }}" placeholder="Enter email address">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="status" value="active" class="flat-green" @if($admin->status == 'active') checked @endif>
                                        <strong>Active</strong>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="status" value="inactive" class="flat-red" @if($admin->status == 'inactive') checked @endif>
                                        <strong>Inactive</strong>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="photo">Browse Photo</label>
                                    <input type="file" class="form-control btn-primary" name="photo">
                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <img src="{{$admin->originalPhoto}}" width="80px" height="80px">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address"> Full Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter address">{{ (old('address'))?:$admin->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection