@extends('admin.layouts.layout')
@section('content')

    <section class="content-header">
        <h1>
            Welcome {{ config('app.name') }}
            <small>Dashboard reporting.</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view')}}" class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-gears"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number">{{$total_order}}</span>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view/?status=pending')}}" class="info-box">
                    <span class="info-box-icon bg-red-gradient"><i class="fa fa-gear"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending Orders</span>
                        <span class="info-box-number">{{$pending_order}}</span>
                    </div>
                </a>
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view/?status=accepted')}}" class="info-box">
                    <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-gear"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Accepted Orders</span>
                        <span class="info-box-number">{{$accepted_order}}</span>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view/?status=completed')}}" class="info-box">
                    <span class="info-box-icon bg-green-gradient"><i class="fa fa-gear"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Completed Orders</span>
                        <span class="info-box-number">{{$completed_order}}</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view/?status=delivered')}}" class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-hourglass-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Delivered Orders</span>
                        <span class="info-box-number">{{$delivered_order}}</span>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{url('/orders/view/?status=cancel')}}" class="info-box">
                    <span class="info-box-icon bg-red-gradient"><i class="fa fa-hourglass-start"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Cancel Orders</span>
                        <span class="info-box-number">{{$cancel_order}}</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- /.row -->

        {{--<div class="row">--}}
            {{--<section class="content">--}}
                {{--<div class="box box-primary">--}}
                    {{--<div class="box-header">--}}
                        {{--<h3 class="box-title text-center">Project and Tasks Status</h3>--}}
                    {{--</div>--}}
                    {{--<div class="box-body">--}}
                        {{--<table id="example1" class="table table-bordered table-striped">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>SL</th>--}}
                                {{--<th>Project Title</th>--}}
                                {{--<th>Start/End Date</th>--}}
                                {{--<th>Status</th>--}}
                                {{--<th>Pending</th>--}}
                                {{--<th>Progress</th>--}}
                                {{--<th>Postponed</th>--}}
                                {{--<th>Done</th>--}}
                                {{--<th>Total</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}


                            {{--<tfoot>--}}
                            {{--<tr>--}}
                                {{--<th>SL</th>--}}
                                {{--<th>Project Title</th>--}}
                                {{--<th>Start/End Date</th>--}}
                                {{--<th>Status</th>--}}
                                {{--<th>Pending</th>--}}
                                {{--<th>Progress</th>--}}
                                {{--<th>Postponed</th>--}}
                                {{--<th>Done</th>--}}
                                {{--<th>Total</th>--}}
                            {{--</tr>--}}
                            {{--</tfoot>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
        {{--</div>--}}
    </section>
@endsection