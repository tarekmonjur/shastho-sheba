<style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}

.modal-content{padding: 15px;}

</style>

<div class="modal-content">
    <div class="row" style="padding: 0px 20px;">
        <div class="col-xs-12">
    		<div class="row invoice-title">
                <div class="col-xs-4"><h3>Invoice</h3></div>
                <div class="col-xs-4 text-center"><h3>{{config('app.name')}}</h3></div>
                <div class="col-xs-4"><h4 class="pull-right" style="margin-top: 26px">Order # {{$order->invoice_no}}</h4></div> 
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-4">
    				<address>
    				<strong>Billed To:</strong><br>
    					{{$order->user->fullname}}<br>
                        {{$order->user->mobile_no}}<br>
    					{{$order->user->city}}<br>
    					{{$order->user->address}}
    				</address>
    			</div>
                <div class="col-xs-4 text-center" style="opacity: .7">
                    <img src="{{asset(config('setting.site_img'))}}/logo.png" width="120px">
                </div>
    			<div class="col-xs-4 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
    					{{$order->contact_person}}<br>
                        {{$order->contact_mobile}}<br>
                        {{$order->order_city}}<br>
                        {{$order->order_area}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Cash Payment<br>
    					{{$order->user->email}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$order->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="row">
            @if($view == 'order')    
            <div class="col-md-12">

               <div class="panel panel-default checkout">

                <div class="panel-heading">Your Shopping Order Summary</div>

                <div style="font-size: 12px;">

                <div class="box">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-light-blue">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Qantity</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->details as $details)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$details->medicine_name}}</td>
                                <td>{{$details->medicine_code}}</td>
                                <td>{{$details->medicine_type}}</td>
                                <td>{{$details->unit}}</td>
                                <td>{{$details->price}}</td>
                                <td>{{$details->quantity}}</td>
                                <td>{{$details->discount}}</td>
                                <td>{{$details->total_price}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-right" colspan="8">Subtotal : </td>
                                <td>{{$order->total_discount_amount}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="8">Vat : </td>
                                <td>{{$order->vat_amount}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="8">Delivery Fee : </td>
                                <td>{{$order->delivery_fee}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="8">Processing Fee : </td>
                                <td>{{$order->processing_fee}}</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="8">Total Payable Amount : </td>
                                <td>{{$order->total_payable_amount}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                </div>
                </div>
            </div>
            @endif

            @if($view == 'prescription')  
            <div class="col-md-12">

               <div class="panel panel-default checkout">

                <div class="panel-heading">Your Prescription</div>

                <div style="font-size: 12px;">

                <div class="box text-center">
                    <img src="{{$order->prescription_image}}" class="text-center img-responsive">
                </div>

                </div>
                </div>
            </div>
            @endif

        </div>
    	</div>
    </div>
    <div class="row no-print">
            <div class="col-xs-12">
                <button id="invoice_print" type="button" class="btn btn-success pull-right" onclick="PrintInvoice('invoice')"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
</div>