@extends('site.layouts.layout')

@section('content')


    <div class="container container-custom" style="margin-bottom: 100px">

        <div class="row">

            <div class="col-md-12">

               <h2 style="margin: 30px 0px 20px">Dashboard</h2>

               <div class="panel panel-default checkout">

			    <div class="panel-heading">Your Shopping Order List</div>

			    <div class="panel-body" style="font-size: 12px; padding-bottom: 50px">

	            <div class="row">
			        <div class="col-md-12 col-sm-12">
			            <form action="">
			                <div class="row">
			                    <div class="col-md-3 col-sm-3">
			                        <div class="form-group">
			                            <label for="invoice_no">Invoice/Mobile No </label>
			                            <input type="text" id="invoice_no" class="input" name="invoice_no" value="{{ isset($strings['invoice_no'])?$strings['invoice_no']:old('invoice_no') }}" placeholder="Enter Invoice/Mobile No...">
			                        </div>
			                    </div>

			                    <div class="col-md-2 col-sm-2">
			                        <div class="form-group">
			                            <label for="from_date">From Date </label>
			                            <input type="text" id="from_date" class="input datepicker" name="from_date" value="{{ isset($strings['from_date'])?$strings['from_date']:old('from_date') }}" placeholder="Enter From Date...">
			                        </div>
			                    </div>

			                    <div class="col-md-2 col-sm-2">
			                        <div class="form-group">
			                            <label for="to_date">To Date </label>
			                            <input type="text" id="to_date" class="input datepicker" name="to_date" value="{{ isset($strings['to_date'])?$strings['to_date']:old('to_date') }}" placeholder="Enter To Date...">
			                        </div>
			                    </div>

			                    <?php $status = isset($strings['status'])?$strings['status']:old('status'); ?>

			                    <div class="col-md-3 col-sm-3">
			                        <div class="form-group">
			                            <label for="to_date">Status </label>
			                            <select name="status" class="input">
			                                <option value="">-- Select Status --</option>
			                                <option value="pending" @if($status == 'pending') selected @endif>Pending</option>
			                                <option value="accepted" @if($status == 'accepted') selected @endif>Accepted</option>
			                                <option value="undelivered" @if($status == 'undelivered') selected @endif>Undelivered</option>
			                                <option value="delivered" @if($status == 'delivered') selected @endif>Delivered</option>
			                                <option value="completed" @if($status == 'completed') selected @endif>Completed</option>
			                                <option value="cancel" @if($status == 'cancel') selected @endif>Cancel</option>
			                            </select>
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

			    <div class="box">
			        <table class="table table-bordered table-striped">
			            <thead class="bg-light-blue">
			                <tr>
			                	<th>SL</th>
			                    <th>Invoice</th>
			                    <th>Contact</th>
			                    <th>Address</th>
			                    <th>Prescription</th>
			                    <th>Status</th>
			                    <th>Payment</th>
			                    <th>Actual Amount</th>
			                    <th>Payable Amount</th>
			                    <th>Created</th>
			                </tr>
			            </thead>
			            <tbody>
			            @forelse($orders as $order)
			                <tr>
			                	<td>{{$loop->iteration}}</td>
			                    <td><a href="javascript:void(0)" onclick="showInvoice('{{$order->id}}', 'order')">{{$order->invoice_no}}</a></td>
			                    <td>
			                        Person : {{$order->contact_person}} <br>
			                        Mobile : {{$order->contact_mobile}} <br>
			                    </td>
			                    <td>
			                        City : {{$order->order_city}} <br>
			                        Area : {{$order->order_area}} <br>
			                    </td>
			                    <td>
			                    	@if($order->prescription_image)
			                    	<a href="javascript:void(0)" onclick="showInvoice('{{$order->id}}', 'prescription')">
				                    	<img src="{{$order->prescription_image}}" width="60px">
			                    	</a>
			                    	@endif
			                    </td>
		                        <td>
			                        <div class="btn-group">
			                        	<button type="button" class="btn btn-xs 
			                        	@if($order->order_status == 'pending')
			                          	btn-warning
				                        @elseif($order->order_status == 'accepted')
				                        btn-info
				                        @elseif($order->order_status == 'undelivered')
				                        btn-warning
				                        @elseif($order->order_status == 'delivered')
				                        btn-primary
				                        @elseif($order->order_status == 'completed')
				                        btn-success
				                        @elseif($order->order_status == 'cancel')
				                        btn-danger
				                        @endif 
				                        dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    @if($order->order_status == 'pending')
			                          	{{ucfirst($order->order_status)}}
				                        @elseif($order->order_status == 'accepted')
				                        {{ucfirst($order->order_status)}}
				                        @elseif($order->order_status == 'undelivered')
				                        {{ucfirst($order->order_status)}}
				                        @elseif($order->order_status == 'delivered')
				                        {{ucfirst($order->order_status)}}
				                        @elseif($order->order_status == 'completed')
				                        {{ucfirst($order->order_status)}}
				                        @elseif($order->order_status == 'cancel')
				                        {{ucfirst($order->order_status)}}
				                        @endif 
				                        <span class="caret"></span>
									  </button>
									  @if($order->order_status == 'pending')
			                          <ul class="dropdown-menu">
				                        <li><a href="javascript:void(0)" onclick="confirmAction('Cancel', 'Are you sure cancle this?', '{{url('order-status/'.$order->id)}}')" class="text-warning">Cancel</a></li>
			                          </ul>
				                        @endif
			                      </div>
			                    </td>
			                    <td>
			                        @if($order->payment_status == 'pending')
			                        <span class="label label-warning">{{ucfirst($order->payment_status)}}</span>
			                        @elseif($order->payment_status == 'completed')
			                        <span class="label label-success">{{ucfirst($order->payment_status)}}</span>
			                        @endif
			                    </td>
			                    <td><label class="label label-info">{{$order->total_actual_amount}}</label></td>
			                    <td><label class="label label-info">{{$order->total_payable_amount}}</label></td>
			                    <td>{{$order->created_at}}</td>
			                </tr>
			            @empty
			            	<tr>
			            		<td colspan="10">Data not available...</td>
			            	</tr>
			            @endforelse	
			            </tbody>
			        </table>
			        @if(isset($strings))
			        {{$orders->appends($strings)->links()}}
			        @else
			        {{$orders->links()}}
			        @endif
			    </div>


			    </div>

				</div>

            </div>

        </div>

    </div>


    <!-- invoice modal -->
    <div class="modal fade bs-example-modal-lg" id="invoiceModal">
        <div class="modal-dialog modal-lg" role="document" id="invoice">
            
        </div>
    </div>


@endsection


@push('scripts')

    <script type="text/javascript">

        function showInvoice(order_id, view){

            $.ajax({
                url : baseUrl+ '/order-invoice/'+order_id,
                type : 'get',
                dataType : 'text',
                data: {view : view},
                success : function (data, status){
                    $('#invoice').html(data);
                    $('#invoiceModal').modal('show');
                },
                error : function(error, status){

                }
            })
        }

    </script>

@endpush