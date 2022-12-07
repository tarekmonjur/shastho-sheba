@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/companies/view')}}">Manage Medicine Company</a></li>
        @if(canAccess("companies/add"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/companies/add')}}"> Add Medicine Company</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("companies/edit"))?true:false;
    $delete = (canAccess("companies/delete"))?true:false;
    ?>

    <div class="box">
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Company Name</th>
                <th>Slug</th>
                <th>Address</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$company->medicine_company_name}}</td>
                    <td>{{$company->medicine_company_slug}}</td>
                    <td>{{$company->medicine_company_address}}</td>
                    <td>
                        @if($company->medicine_company_status == 'active')
                            <span class="label label-success">{{$company->medicine_company_status}}</span>
                        @else
                            <span class="label label-success">{{$company->medicine_company_status}}</span>
                        @endif
                    </td>
                    <td>{{$company->created_at}}</td>
                    <td>{{$company->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            @if($edit == true)
                                <a class="btn btn-xs btn-primary" href="{{url('companies/edit/'.$company->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                                <a onclick="return confirmDelete('delete', 'Are you sure delete this type?', 'delete_{{$company->id}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                                <form method="post" action="{{url('companies/delete/'.$company->id)}}" id="delete_{{$company->id}}">
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
                <th>Company Name</th>
                <th>Slug</th>
                <th>Address</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
