@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/types/view')}}">Manage Medicine Types</a></li>
        @if(canAccess("types/create"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('types/create')}}"> Create Medicine Type</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("types/edit"))?true:false;
    $delete = (canAccess("types/delete"))?true:false;
    ?>


    <div class="box">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Type Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="120px">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$type->type_name}}</td>
                    <td>{{$type->created_at}}</td>
                    <td>{{$type->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            @if($edit == true)
                                <a class="btn btn-xs btn-primary" href="{{url('types/edit/'.$type->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                                <a onclick="return confirmDelete('delete', 'Are you sure delete this type?', 'delete_{{$type->id}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                                <form method="post" action="{{url('types/delete/'.$type->id)}}" id="delete_{{$type->id}}">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>SL</th>
                <th>Type Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="120px">Action</th>
            </tr>
            </tfoot>
        </table>
    </div>


@endsection
