@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/roles/view')}}">Manage Role Permissions</a></li>
        <li class="active"><a href="#">Create Role Permissions</a></li>
        @if(canAccess("roles/view"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/roles/view')}}"> View Role</a>
        @endif
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form role="form" method="post" action="{{url('roles/create')}}">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('role_name') ? ' has-error' : '' }}">
                                    <label for="role_name">Role Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="role_name" value="{{ old('role_name') }}" placeholder="Enter Role Name">
                                    @if ($errors->has('role_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role_description">Role Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="role_description" placeholder="Enter Role Description">{{ old('role_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" class="all" onclick="checkAll()">
                                    select all
                                </label>
                            </div>

                            <?php $permissions = getPermissionList();?>
                            @foreach($permissions as $permission)
                            <div class="col-md-4">
                                <h4>{{$loop->iteration}}. <storng>{{ucfirst($permission["name"])}}</storng></h4>
                                @foreach($permission['permission'] as $key => $item)
                                <div>
                                    <label style="margin-left: 15px">
                                        <input type="checkbox" name="permissions[]" value="{{$key}}" class="flat-green check">
                                        {{$item}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function checkAll(){

            var checkAll = $('input.all');
            var checkboxes = $('input.check');

            if(checkAll.prop('checked')){
                checkboxes.iCheck('check');
            }else{
                checkboxes.iCheck('uncheck');
            }


        }
    </script>
@endpush