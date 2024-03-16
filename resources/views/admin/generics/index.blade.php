@extends('admin.layouts.layout')
@section('content')

<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="{{url('/generics/view')}}">Manage Medicine Generics</a></li>
    @if(canAccess("generics/add"))
    <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/generics/add')}}"> Add Medicine Generics</a>
    @endif
</ol>

<?php
$edit = (canAccess("generics/edit"))?true:false;
$delete = (canAccess("generics/delete"))?true:false;
?>

<div class="box table-responsive">
    <table id="example2" class="table table-bordered table-striped">
        <thead class="bg-light-blue">
        <tr>
            <th>SL</th>
            <th>Generic Name</th>
            <th>Precaution</th>
            <th>Indication</th>
            <th>Contraindication</th>
            <th>Dose</th>
            <th>Side Effect</th>
            <th>Mode of Action</th>
            <th>Interaction</th>
            <th>Created</th>
            <th>Updated</th>
            <th width="80px">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $sl = $generics->perPage() * ($generics->currentPage() - 1);?>
        @foreach($generics as $generic)
        
        <tr>
            <td>{{++$sl}}</td>
            <td>{{$generic->generic_name}}</td>
            <td>{{$generic->precaution}}</td>
            <td>{{$generic->indication}}</td>
            <td>{{$generic->contraindication}}</td>
            <td>{{$generic->dose}}</td>
            <td>{{$generic->side_effect}}</td>
            <td>{{$generic->mode_of_action}}</td>
            <td>{{$generic->interaction}}</td>
            <td>{{$generic->created_at}}</td>
            <td>{{$generic->updated_at}}</td>
            <td>
                <div class="btn-group">
                    @if($edit == true)
                    <a class="btn btn-sm btn-primary btn-xs" href="{{url('generics/edit/'.$generic->id)}}">Edit</a>
                    @endif
                    @if($delete == true)
                    <a onclick="return confirmAction('delete', 'Are you sure delete this admin?', '{{url('generics/delete/'.$generic->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>SL</th>
            <th>Generic Name</th>
            <th>Precaution</th>
            <th>Indication</th>
            <th>Contraindication</th>
            <th>Dose</th>
            <th>Side Effect</th>
            <th>Mode of Action</th>
            <th>Interaction</th>
            <th>Created</th>
            <th>Updated</th>
            <th width="80px">Action</th>
        </tr>
        </tfoot>
    </table>
    {{$generics->links()}}
</div>

@endsection