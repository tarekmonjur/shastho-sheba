@extends('site.layouts.layout')

@section('content')



    <div class="subtitle-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="subtitle-text">

                        <div class="sub-link">

                            <a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>

                            <a href="{{url($slug)}}">{{ucfirst($slug)}}</a>

                            <i class="fa fa-angle-right"></i> {{$medicine->medicine_name}}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="care-well-product-manin-info">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-3">

                    <div class="care-well-box-img">

                        <a href=""><img src="{{$medicine->mediumPhoto}}" alt="" title="CAREWELL FIRST AID BOX TYPE 2"></a>

                    </div>

                    <div class="visitor-calculationbox row">

                        <span class="visitor-count col-xs-4">{{$medicine_total_view}}</span>

                        <span class="visitor-counter-text col-xs-8">people are viewing this currently</span>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="care-well-product-main">

                        <div class="care-well-product-box">

                            <h2>{{$medicine->medicine_name}}</h2>

                            @if($slug == 'prescriptions')
                            <span class="company-author">By <a href="{{url('/manufacturers/'.$medicine->company->medicine_company_slug)}}">{{$medicine->company->medicine_company_name}}</a></span>
                            @elseif($slug == 'non-prescriptions')
                            <span class="company-author">By <a href="{{url('non-prescriptions/manufacturers/'.$medicine->company->medicine_company_slug)}}">{{$medicine->company->medicine_company_name}}</a></span>
                            @else
                            <span class="company-author">By <a href="#">{{$medicine->company->medicine_company_name}}</a></span>
                            @endif

                            <span class="product-author"><strong>SOLD BY :</strong> Channel Partners and Fulfilled by <strong>shastho-shaba.com</strong></span>

                            <span class="care-well-discout">

                                @if($medicine->offer_status == 'running' && !empty($medicine->offer_percent))

                                    <?php $medicine_price = number_format($medicine->medicine_price - (($medicine->medicine_price * $medicine->offer_percent) / 100), 2); ?>

                                    <del>TK.{{$medicine->medicine_price}}</del>

                                    <strong>TK.{{ $medicine_price }}</strong><br>

                                @else

                                    <del></del>

                                    <?php $medicine_price = $medicine->medicine_price; ?>

                                    <strong>TK.{{$medicine_price}}</strong><br>
                                @endif

                                <span class="per-unit">

                                    @if($slug == 'prescriptions')

                                        (unit per box)

                                    @else

                                     (per unit)

                                    @endif

                                </span>

                                @if($medicine->offer_status == 'running' && !empty($medicine->offer_percent))
                                <span class="care-well-offer">{{$medicine->offer_percent}}% Off</span></span>
                                @endif

                            @if($medicine->medicine_cashback !='')
                            <div class="product-info">{{$medicine->medicine_cashback}}</div>
                            @endif
                            @if($medicine->medicine_note !='')
                            <div class="product-notice"><strong>Note:</strong>{{$medicine->medicine_note}}</div>
                            @endif

                        </div>



                    <span class="care-well-product-details">
						<span class="product-details">Product Details</span>
						<span class="product-details-manufct">
							<span class="product-del-manufct-item">Manufacturer<br> <strong>{{$medicine->company->medicine_company_name}}</strong></span>

							<span class="product-del-manufct-item bordrt-left-right">Medicine Type<br> <strong>{{$medicine->type->type_name}}</strong></span>

							<span class="product-del-manufct-item">Power/Size <br> <strong>{{$medicine->medicine_power}}</strong> </span>
						</span>
					</span>

                    <span class="care-well-product-details" style="height: auto;">
                        <span class="product-details">Product Side Effect</span>
                        <span class="product-details-manufct">
                                {{$medicine->medicine_side_effect}}
                        </span>
                    </span>

                    <span class="care-well-product-details" style="height: auto;">
                        <span class="product-details">Product Description</span>
                        <span class="product-details-manufct">
                                {{$medicine->medicine_side_effect}}
                        </span>
                    </span>



<!--                         <div class="product-review">

                            <div class="product-review-content">

                                <h5>PRODUCT REVIEW (0)</h5>

                                No reviews yet

                                <a href="">Write a review </a>

                            </div>

                            <span class="review-rate">

							<i class="fa fa-star"></i><br>

							0/1

						  </span>

                        </div> -->

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="care-well-inside">

                        <div class="care-well-form">

                            <span class="care-well-info">Available</span>

                            <form action="{{url('')}}" method="post" id="addtoCard">

                                <input type="hidden" name="id" value="{{$medicine->id}}">

                                <label for="unit">Unit</label>

                                <select name="unit" id="unit">

                                    <option value="box">Box</option>

                                    <option value="strip">Strip</option>

                                    <option value="single">Single</option>

                                </select>

                                <label for="qty">Quantity</label>

                                <select name="qty" id="qty">

                                    @for($i=1; $i<=20; $i++)

                                    <option value="{{$i}}">{{$i}} - TK.{{$medicine_price * $i}}</option>

                                    @endfor

                                </select>

                                {{--<label for="" class="label-small">Check estimated delivery time</label>--}}

                                {{--<input type="text"  placeholder="Enter your pincode">--}}

                                {{--<button>Go</button>--}}

                                <button type="submit" class="adtocart">Add to Cart</button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    @if(count($medicine_views) > 0)

    <div class="care-well-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>PEOPLE WHO VIEW THIS ALSO VIEWED</h1>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="features-slider-wrapper">

                        <div class="features-slider-active owl-carousel">

                            @foreach($medicine_views as $medicine_view)
                            <div class="care-well-product">

                                <div class="features-single-item">

                                    <div class="slide-img-wrapper">
                                        <a href="{{url('non-prescriptions/'.$medicine_view->medicine_slug)}}">
                                            @if($medicine_view->medicine_image)    
                                             <img src="{{asset('files/medicine/medium/'.$medicine_view->medicine_image)}}" alt="">
                                             @else
                                             <img src="{{asset(config('setting.site_img').'medicine.jpg')}}" alt="">
                                             @endif
                                        </a>

                                    </div>

                                    <div class="features-text-best">

                                        <span class="pro-name">{{$medicine_view->medicine_name}}</span>

                                        <span class="price-text">
                                            @if($medicine_view->offer_status == 'running' && !empty($medicine_view->offer_percent))
                                            <del>TK.{{$medicine_view->medicine_price}}</del>
                                            
                                            TK.{{ number_format($medicine_view->medicine_price - (($medicine_view->medicine_price * $medicine_view->offer_percent) / 100), 2) }}

                                            @else
                                                <span>TK.{{$medicine_view->medicine_price}}</span>
                                            @endif
                                        </span>

                                        <div class="view-del"><a href="{{url('non-prescriptions/'.$medicine_view->medicine_slug)}}">View Details</a></div>

                                    </div>

                                </div>

                            </div>
                            @endforeach


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @endif



@endsection



@push('scripts')

<script>

    var medicine = JSON.parse('<?php echo $medicine?>');

    // console.log(medicine);

    $(document).on("change","#unit",function () {

        var unit = $(this).val();

        var html = "";

        if(medicine.offer_status == 'running' && medicine.offer_percent){
            var price = (medicine.medicine_price - ((medicine.medicine_price * medicine.offer_percent) /100)).toFixed(2);
        }else{
            var price =  medicine.medicine_price;
        }
        

        var unit_per_box =  medicine.medicine_unit_per_box;

        var unit_per_strip =  medicine.medicine_unit_per_strip;



        if(unit == 'box'){

            for (var i = 1; i <= 20; i++) {

                html += "<option value=" + i + ">" + i + " - TK." + (i*price).toFixed(2)+ "</option>";

            }

        }else if(unit == 'strip'){

            price = price / unit_per_box;

            for (var i = 1; i <= 20; i++) {

                html += "<option value=" + i + ">" + i + " - TK." + (i*price).toFixed(2) + "</option>";

            }

        }else if(unit == 'single') {

            price = (price / unit_per_strip)/unit_per_box;

            for (var i = 1; i <= 20; i++) {

                html += "<option value=" + i + ">" + i + " - TK." + (i*price).toFixed(2) + "</option>";

            }

        }

        $("#qty").html(html);

    });

</script>

@endpush