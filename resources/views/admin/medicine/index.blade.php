@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/medicines/view')}}">Manage Medicine</a></li>
        @if(canAccess("medicines/add"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/medicines/add')}}"> Add Medicine</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("medicines/edit"))?true:false;
    $delete = (canAccess("medicines/delete"))?true:false;
    ?>

        <div class="row">
        <div class="col-md-11 col-md-offset-1 col-sm-12">
            <form action="">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="name_code">Medicine Name/Code </label>
                            <input type="text" id="name_code" class="form-control" name="name_code" value="{{ isset($strings['name_code'])?$strings['name_code']:old('name_code') }}" placeholder="Enter Medicine Name/Code...">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="price">Medicine Price </label>
                            <input type="text" id="price" class="form-control" name="price" value="{{ isset($strings['price'])?$strings['price']:old('price') }}" placeholder="Enter Medicine Price...">
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                            <label for="power">Medicine Power </label>
                            <input type="text" id="power" class="form-control" name="power" value="{{ isset($strings['power'])?$strings['power']:old('power') }}" placeholder="Enter Medicine Power...">
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="form-control btn btn-primary" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="box table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Medicine Info</th>
                <th>Type/Category</th>
                <th>Unit Per</th>
                <th>Power/Price</th>
                <th>Image</th>
                <th>Date</th>
                <th>Status</th>
                {{--<th>Side Effect</th>--}}
                {{--<th>Description</th>--}}
                <th>CashBack/Notes</th>
                <th>Created/Updated</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $sl = $medicines->perPage() * ($medicines->currentPage() - 1);?>
            @foreach($medicines as $medicine)
                <tr>
                    <td>{{++$sl}}</td>
                    <td>
                        <strong>Code : </strong>{{$medicine->medicine_code}}<br>
                        <strong>Name : </strong>{{$medicine->medicine_name}}<br>
                        <strong>Manufacturer : </strong>{{($medicine->company)?$medicine->company->medicine_company_name:''}}<br>
                        <strong>Slug : </strong>{{$medicine->medicine_slug}}
                    </td>
                    <td>
                        <strong>Type : </strong>{{($medicine->type)?$medicine->type->type_name:''}}<br>
                        <strong>Category : </strong>{{($medicine->category)?$medicine->category->category_name:''}}
                    </td>
                    <td>
                        <strong>Box : </strong>{{$medicine->medicine_unit_per_box}}<br>
                        <strong>Strip : </strong>{{$medicine->medicine_unit_per_strip}}
                    </td>
                    <td>
                        <strong>Power : </strong>{{$medicine->medicine_power}}<br>
                        <strong>Price : </strong>{{$medicine->medicine_price}}
                    </td>
                    <td><img src="{{$medicine->smallPhoto}}" width="80px"></td>
                    <td>
                        <strong>Manufacture : </strong>{{$medicine->medicine_manufacture_date}}<br>
                        <strong>Expiry : </strong>{{$medicine->medicine_expiry_dagte}}
                    </td>
                    <td>
                        <strong>New : </strong><span class="label label-info">{{$medicine->medicine_is_new}}</span><br>
                        <strong>Active : </strong><span class="label @if($medicine->medicine_is_active == 'yes') label-success @else label-danger @endif">{{$medicine->medicine_is_active}}</span>
                    </td>
                    {{--<td>{{$medicine->medicine_side_effect}}</td>--}}
                    {{--<td>{{$medicine->medicine_description}}</td>--}}
                    <td>
                        <strong>CashBack : </strong> {{$medicine->medicine_cashback}}<br>
                        <strong>Notes : </strong> {{$medicine->medicine_note}}
                    </td>
                    <td>
                        <strong>Created :</strong> {{$medicine->created_at}}<br>
                        <strong>Updated :</strong> {{$medicine->updated_at}}
                    </td>
                    <td width="100px">
                        <div class="btn-group">
                            @if($edit == true)
                                <a class="btn btn-sm btn-primary btn-xs" href="{{url('medicines/edit/'.$medicine->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                                <a onclick="return confirmAction('delete', 'Are you sure delete this medicines?', '{{url('medicines/delete/'.$medicine->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>SL</th>
                <th>Medicine Info</th>
                <th>Type/Category</th>
                <th>Unit Per</th>
                <th>Power/Price</th>
                <th>Image</th>
                <th>Date</th>
                <th>Status</th>
                {{--<th>Side Effect</th>--}}
                {{--<th>Description</th>--}}
                <th>CashBack/Notes</th>
                <th>Created/Updated</th>
                <th width="100px">Action</th>
            </tr>
            </tfoot>
        </table>
        @if(isset($strings))
        {{$medicines->appends($strings)->links()}}
        @else
        {{$medicines->links()}}
        @endif
    </div>

@endsection