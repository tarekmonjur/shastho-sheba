@extends('site.layouts.layout')

@section('content')


    <div class="container container-custom" style="margin-bottom: 100px">

        <div class="row">

            <div class="col-md-12">

               <h2 style="margin: 30px 0px 20px">Promotion <small class="pull-right">Your Referral Code : <b>{{$auth->referral_code}}</b></small></h2>

               <div class="panel panel-default checkout">

			    <div class="panel-heading">Your Promotion Bonus</div>

			    <div class="panel-body" style="font-size: 12px; padding-bottom: 50px">

			    <div class="box">
			        <table class="table table-bordered table-striped">
			            <thead class="bg-light-blue">
			                <tr>
			                	<th>SL</th>
			                    <th>Date</th>
			                    <th>Promotion Title</th>
			                    <th>Earn Amount</th>
			                    <th>Cost Amount</th>
			                    <th>Balance Amount</th>
			                </tr>
			            </thead>
			            <tbody>
			            @forelse($promotions as $promotion)
			                <tr>
			                	<td>{{$loop->iteration}}</td>
			                    <td>{{$promotion->created_at}}</td>
			                    <td>{{$promotion->promotion_title}}</td>
			                    <td>{{$promotion->debit}}</td>
			                    <td>{{$promotion->credit}}</td>
			                    <td>{{$promotion->balance}}</td>
			                </tr>
			            @empty
			            	<tr>
			            		<td colspan="6">Data not available...</td>
			            	</tr>
			            @endforelse	
			            </tbody>
			        </table>
			        {{$promotions->links()}}
			    </div>


			    </div>

				</div>

            </div>

        </div>

    </div>

@endsection