@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/admins/view')}}">Manage Admins</a></li>
        @if(canAccess("admins/create"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/admins/create')}}"> Create Admin</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("admins/edit"))?true:false;
    $delete = (canAccess("admins/delete"))?true:false;
    ?>

    <div class="box">
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead class="bg-light-blue">
                <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Designation</th>
                    <th>Mobile No</th>
                    <th>Role Name</th>
                    <th>Photo</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th width="80px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$admin->fullname}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->designation}}</td>
                        <td>{{$admin->mobile_no}}</td>
                        <td><label class="label label-info">{{$admin->role->role_name}}</label></td>
                        <td><img width="60px" src="{{$admin->smallPhoto}}" alt=""></td>
                        <td>
                            @if($admin->status == 'active')
                            <span class="label label-success">{{ucfirst($admin->status)}}</span>
                            @else
                            <span class="label label-danger">{{ucfirst($admin->status)}}</span>
                            @endif
                        </td>
                        <td>{{$admin->address}}</td>
                        <td>{{$admin->created_at}}</td>
                        <td>{{$admin->updated_at}}</td>
                        <td>
                            <div class="btn-group">
                                @if($edit == true)
                                <a class="btn btn-sm btn-primary btn-xs" href="{{url('admins/edit/'.$admin->id)}}">Edit</a>
                                @endif
                                @if($delete == true)
                                <a onclick="return confirmAction('delete', 'Are you sure delete this admin?', '{{url('admins/delete/'.$admin->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Designation</th>
                    <th>Mobile No</th>
                    <th>Role Name</th>
                    <th>Photo</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th width="80px">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection