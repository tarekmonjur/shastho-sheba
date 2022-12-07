@extends('site.layouts.layout')

@section('content')



    <div class="subtitle-img-area">

        <img src="{{asset(config('setting.site_img'))}}/non-prescriptions_1920.jpg" alt="">

        <div class="subtitle-big-text">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <div class="subtitle-text-big">

                            <h1>NON-PRESCRIPTIONS</h1>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <section class="home-fetures non-prescription-shop-slider-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6 text-left">

                    <div class="sub-link">

                        <a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>

                        <a href="#">Non-Prescriptions</a>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>SHOP BY CATEGORY</h1>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="features-slider-wrapper">

                        <div class="features-slider-active owl-carousel">

                            @foreach($nonPrescriptionCategories as $nonPrescriptionCategory)

                            <div class="features-single-item shop-buy-category">

                                <div class="slide-img-wrapper">

                                    <a href="{{url('non-prescriptions/'.$nonPrescriptionCategory->category_slug)}}">

                                        <img src="{{$nonPrescriptionCategory->smallPhoto}}" alt="">

                                    </a>

                                </div>

                                <div class="features-text">

                                    <h3>

                                        <a href="{{url('non-prescriptions/'.$nonPrescriptionCategory->category_slug)}}" style="color:#4183f4">

                                            {{$nonPrescriptionCategory->category_name}} <span><a href="">Shop Now</a></span>

                                        </a>

                                    </h3>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="home-fetures non-prescription-best-seller-slider-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1 class="white-color">BEST SELLERS</h1>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="features-slider-wrapper">

                        <div class="features-slider-active best-seller-slider owl-carousel">
                            @foreach($bestSallers as $bestSaller)
                            <div class="features-single-item">

                                <div class="slide-img-wrapper">
                                    <a href="{{url('non-prescriptions/'.$bestSaller->medicine_slug)}}">
                                        <img src="{{$bestSaller->mediumPhoto}}" alt="">
                                    </a>

                                </div>

                                <div class="features-text-best">

                                    <span class="pro-name">{{$bestSaller->medicine_name}}</span>

                                    <span class="price-text">TK.{{$bestSaller->medicine_price}}</span>

                                    <div class="view-del"><a href="{{url('non-prescriptions/'.$bestSaller->medicine_slug)}}">View Details</a></div>

                                </div>

                            </div>
                            @endforeach    
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="home-fetures non-prescription-shop-slider-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>BEST DEALS</h1>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="features-slider-wrapper">

                        <div class="features-slider-active owl-carousel">

                            @foreach($bestDeals as $bestDeal)

                            <div class="features-single-item">

                                <div class="offer-buget-area">

                                    @if($bestDeal->offer_status == 'running' && $bestDeal->offer_percent)

                                    <div class="offer-badge"></div>
                                    
                                    <div class="b-text">{{$bestDeal->offer_percent}}
                                        <span class="buget-per">%</span><span class="off-offer">Off</span>
                                    </div>

                                    @endif

                                    <div class="slide-img-wrapper">
                                        <a href="{{url('non-prescriptions/'.$bestDeal->medicine_slug)}}">
                                            <img src="{{$bestDeal->mediumPhoto}}" alt="">
                                        </a>

                                    </div>

                                </div>



                                <div class="features-text-best">

                                    <span class="pro-name">{{$bestDeal->medicine_name}}</span>

                                    @if($bestDeal->offer_status == 'running' && $bestDeal->offer_percent)

                                    <span class="price-text">
                                        <del>TK.{{$bestDeal->medicine_price}}</del>

                                        TK.{{ number_format($bestDeal->medicine_price - (($bestDeal->medicine_price * $bestDeal->offer_percent) / 100), 2) }}
                                    </span>

                                    @else

                                    <span class="price-text">
                                        TK.{{$bestDeal->medicine_price}}
                                    </span>

                                    @endif

                                    <div class="view-del"><a href="{{url('non-prescriptions/'.$bestDeal->medicine_slug)}}">View Details</a></div>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>




    @if(count($recommends) > 0)

    <div class="recommended-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>RECOMMENDED FOR YOU</h1>

                    </div>

                </div>

            </div>

            <div class="row">

                @foreach($recommends as $recommend)

                <div class="col-md-3">

                    <div class="features-single-item">

                        <div class="slide-img-wrapper">
                            <a href="{{url('non-prescriptions/'.$recommend->medicine_slug)}}">
                                <img src="{{$recommend->mediumPhoto}}" alt="">
                            </a>
                        </div>

                        <div class="features-text-best">

                            <span class="pro-name">{{$recommend->medicine_name}}</span>

                            <span class="price-text">
                                <del>TK.{{$recommend->medicine_price}}</del>

                                TK.{{ number_format($recommend->medicine_price - (($recommend->medicine_price * $recommend->offer_percent) / 100), 2) }}
                            </span>

                            <div class="view-del"><a href="{{url('non-prescriptions/'.$recommend->medicine_slug)}}">View Details</a></div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    @endif



@endsection