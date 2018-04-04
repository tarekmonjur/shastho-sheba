@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/users/view')}}">Manage Users</a></li>
        @if(canAccess("users/add"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/users/add')}}"> Add User</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("users/edit"))?true:false;
    $delete = (canAccess("users/delete"))?true:false;
    ?>

    <div class="box table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-light-blue">
                <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Mobile No</th>
                    <th>Gender</th>
                    <th>Photo</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <!-- <th width="80px">Action</th> -->
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile_no}}</td>
                    <td><label class="label label-info">{{$user->gender}}</label></td>
                    <td><img width="60px" src="{{$user->smallPhoto}}" alt=""></td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->address}}</td>
                    <td>
                        @if($user->status == 'active')
                        <span class="label label-success">{{ucfirst($user->status)}}</span>
                        @else
                        <span class="label label-danger">{{ucfirst($user->status)}}</span>
                        @endif
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <!-- <td>
                        <div class="btn-group">
                            @if($edit == true)
                            <a class="btn btn-sm btn-primary btn-xs" href="{{url('users/edit/'.$user->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                            <a onclick="return confirmAction('delete', 'Are you sure delete this user?', '{{url('users/delete/'.$user->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                            @endif
                        </div>
                    </td> -->
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Mobile No</th>
                    <th>Gender</th>
                    <th>Photo</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <!-- <th width="80px">Action</th> -->
                </tr>
            </tfoot>
        </table>
        {{$users->links()}}
    </div>

@endsection