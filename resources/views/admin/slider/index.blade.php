@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/sliders/view')}}">Manage Sliders</a></li>
        @if(canAccess("sliders/add"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/sliders/add')}}"> Add Slider</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("sliders/edit"))?true:false;
    $delete = (canAccess("sliders/delete"))?true:false;
    ?>

    <div class="box table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Sliders Title</th>
                <th>Sliders Url</th>
                <th>Sliders Image</th>
                <th>Description</th>
                <th>Sliders Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$slider->slider_title}}</td>
                    <td>{{$slider->slider_url}}</td>
                    <td><img src="{{$slider->smallPhoto}}" width="80px"></td>
                    <td>{{$slider->slider_description}}</td>
                    <td>
                        <span class="label @if($slider->slider_status == 'active') label-success @else label-danger @endif">{{$slider->slider_status}}</span>
                    </td>
                    <td>{{$slider->created_at}}</td>
                    <td>{{$slider->updated_at}}</td>
                    <td width="100px">
                        <div class="btn-group">
                            @if($edit == true)
                                <a class="btn btn-sm btn-primary btn-xs" href="{{url('sliders/edit/'.$slider->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                                <a onclick="return confirmAction('delete', 'Are you sure delete this slider?', '{{url('sliders/delete/'.$slider->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>SL</th>
                <th>Sliders Title</th>
                <th>Sliders Url</th>
                <th>Sliders Image</th>
                <th>Description</th>
                <th>Sliders Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection