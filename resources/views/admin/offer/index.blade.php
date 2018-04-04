@extends('admin.layouts.layout')
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/offers/view')}}">Manage Offers</a></li>
        @if(canAccess("offers/add"))
            <a class="btn btn-primary breadcrumb-btn pull-right" href="{{url('/offers/add')}}"> Add Offer</a>
        @endif
    </ol>

    <?php
    $edit = (canAccess("offers/edit"))?true:false;
    $delete = (canAccess("offers/delete"))?true:false;
    ?>

    <div class="box table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="bg-light-blue">
            <tr>
                <th>SL</th>
                <th>Offer Name</th>
                <th>Medicines</th>
                <th>Percent</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Highlight</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$offer->offer_name}}</td>
                    <td>
                        @foreach($offer->medicines as $medicine)
                            {{$loop->iteration}} . {{$medicine->medicine->medicine_name}} <br>
                        @endforeach
                    </td>
                    <td>{{$offer->offer_percent}}</td>
                    <td>{{$offer->offer_start}}</td>
                    <td>{{$offer->offer_end}}</td>
                    <td>
                        <span class="label @if($offer->offer_highlight == 'yes') label-success @else label-danger @endif">{{$offer->offer_highlight}}</span>
                    </td>
                    <td>
                        <span class="label @if($offer->offer_status == 'running') label-warning @else label-success @endif">{{$offer->offer_status}}</span>
                    </td>
                    <td>{{$offer->created_at}}</td>
                    <td>{{$offer->updated_at}}</td>
                    <td width="100px">
                        <div class="btn-group">
                            @if($edit == true)
                                <a class="btn btn-sm btn-primary btn-xs" href="{{url('offers/edit/'.$offer->id)}}">Edit</a>
                            @endif
                            @if($delete == true)
                                <a onclick="return confirmAction('delete', 'Are you sure delete this offer?', '{{url('offers/delete/'.$offer->id)}}')" class="btn btn-xs btn-danger" href="#">Delete</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>SL</th>
                <th>Offer Name</th>
                <th>Medicines</th>
                <th>Percent</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Highlight</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th width="100px">Action</th>
            </tr>
            </tfoot>
        </table>
        {{$offers->links()}}
    </div>

@endsection