@extends('site.layouts.layout')

@section('content')


<div class="home-slider-wrapper">

    <div class="home-slider-active owl-carousel">

        @foreach($sliders as $slider)
        <div class="single-slider-item">

            <img src="{{$slider->originalPhoto}}" alt="">

            <div class="slider-text">

                <div class="container">

                    <div class="row">

                        <div class="col-md-5 col-xs-offset-1">

                            <div class="slider-content">

<!--                                 <h1>{{$slider->slider_title}}</h1>

                                <p>{{$slider->slider_description}}</p> -->

                                <!-- @if($slider->slider_url)
                                <a href="{{$slider->slider_url}}" class="slide-btn slide-btn-one">read more</a>

                                <a href="{{$slider->slider_url}}" class="slide-btn">view</a>
                                @endif     -->
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        @endforeach

    </div>



    <section class="home-message-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="message-head-text">

                        <h1>
                            THE TRUSTED ONLINE MEDICINE PARTNER
                             <span>EASY & CONVENIENT </span>
                         </h1>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-sm-4 col-xs-12 text-center patnar-img-col">

                    <div class="patnar-img">

                        <img src="{{asset(config('setting.site_img'))}}/patnar-3.png" alt="">


                    </div>

                </div>

                <div class="col-sm-4 col-xs-12 text-center patnar-img-col">

                    <div class="patnar-img">

                        <img src="{{asset(config('setting.site_img'))}}/patnar-1.png" alt="">


                    </div>

                </div>

                <div class="col-sm-4 col-xs-12 text-center patnar-img-col-three">

                    <div class="patnar-img">

                        <img src="{{asset(config('setting.site_img'))}}/patnar-2.png" alt="">


                    </div>

                </div>

<!--                 <div class="col-sm-3 text-center">

                    <div class="patnar-img">

                        <img src="{{asset(config('setting.site_img'))}}/patnar-4.png" alt="">

                        <p>Pan Bangladesh Delivery with coverage of over 19,000 PIN codes</p>

                    </div>

                </div> -->

            </div>

        </div>

    </section>



    <section class="home-fetures">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>FEATURED CATEGORIES</h1>

                        <div class="pull-right-seeall"><a class="" href="{{url('/non-prescriptions')}}">View All <i aria-hidden="true" class="fa fa-angle-double-right fa-1"></i></a></div>

                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="features-slider-wrapper">

                        <div class="features-slider-active owl-carousel">

                            @foreach($featureCategories as $featureCategory)

                            <?php

                                    $url_slug = $featureCategory->category_slug;

                                    if($featureCategory->parentRecursive){

                                        $url_slug= $featureCategory->parentRecursive->category_slug.'/'.$url_slug;

                                        if($featureCategory->parentRecursive->parentRecursive){

                                            $url_slug = $featureCategory->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;

                                            if($featureCategory->parentRecursive->parentRecursive->parentRecursive){

                                                $url_slug = $featureCategory->parentRecursive->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;

                                            }

                                        }

                                    }

                                    ?>

                            <div class="features-single-item">

                                <div class="slide-img-wrapper">
                                    <a href="{{url($url_slug)}}">
                                        <img src="{{$featureCategory->smallPhoto}}" alt="">
                                    </a>
                                </div>

                                <div class="features-text">

                                    <h3>{{$featureCategory->category_name}} <span><a href="{{url($url_slug)}}">Shop Now</a></span></h3>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{--<section class="home-offer-area">--}}

        {{--<div class="container">--}}

            {{--<div class="row">--}}

                {{--<div class="col-md-12 text-center">--}}

                    {{--<div class="features-hesd-text">--}}

                        {{--<h1>AMAZING OFFERS</h1>--}}

                        {{--<div class="pull-right-seeall"><a class="" href="">View All <i aria-hidden="true" class="fa fa-angle-double-right fa-1"></i></a></div>--}}

                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="row">--}}

                {{--<div class="col-sm-3">--}}

                    {{--<div class="home-single-offer-item">--}}

                        {{--<a href="" class="top-offer-part">--}}

                            {{--<span class="top-head">15 <span class="top-head-perct">%</span></span>--}}

                            {{--<span class="top-dist">Discount*</span>--}}

                            {{--<span class="top-simple-text">On Prescription Drugs <br>* MINIMUM ORDER VALUE: TK.1000</span>--}}

                        {{--</a>--}}



                        {{--<a href="" class="bottom-offer-part">--}}

                            {{--<span class="bottom-head">use code <span class="bottom-head-big">shastho-sheba15</span></span>--}}

                            {{--<span class="bottom-disc">5% <span class="bottom-disc-small">NMSCash / Wallet</span></span>--}}

                            {{--<span class="bottom-simple-text">(*On all Full Pre-Paid Orders)<br> Cashback validity: 31 days</span>--}}

                        {{--</a>--}}

                    {{--</div>--}}

                {{--</div>--}}



                {{--<div class="col-sm-3">--}}

                    {{--<div class="home-single-offer-item">--}}

                        {{--<a href="" class="top-offer-part top-offer-sec-color">--}}

                            {{--<span class="flat-offet">Flat</span>--}}

                            {{--<span class="top-head"> 10 <span class="top-head-perct">%</span></span>--}}

                            {{--<span class="top-dist">Discount*</span>--}}

                            {{--<span class="top-simple-text">On Prescription Drugs <br>* MINIMUM ORDER VALUE: TK.1000</span>--}}

                        {{--</a>--}}



                        {{--<a href="" class="bottom-offer-part">--}}

                            {{--<span class="bottom-head">use code <span class="bottom-head-big">shastho-sheba15</span></span>--}}

                            {{--<span class="bottom-disc">5% <span class="bottom-disc-small">NMSCash / Wallet</span></span>--}}

                            {{--<span class="bottom-simple-text">(*On all Full Pre-Paid Orders)<br> Cashback validity: 31 days</span>--}}

                        {{--</a>--}}

                    {{--</div>--}}

                {{--</div>--}}



                {{--<div class="col-sm-3">--}}

                    {{--<div class="home-single-offer-item ">--}}

                        {{--<a href="" class="top-offer-part top-offer-thard-color">--}}

                            {{--<span class="flat-offet new-customer">For new customer</span>--}}

                            {{--<span class="rotate-flat">Flat</span>--}}

                            {{--<span class="top-head">15 <span class="top-head-perct">%</span></span>--}}

                            {{--<span class="top-dist">Discount*</span>--}}

                            {{--<span class="top-simple-text">On Prescription Drugs <br>* MINIMUM ORDER VALUE: TK.1000</span>--}}

                        {{--</a>--}}



                        {{--<a href="" class="bottom-offer-part">--}}

                            {{--<span class="bottom-head">use code <span class="bottom-head-big">shastho-sheba15</span></span>--}}

                            {{--<span class="bottom-disc">5% <span class="bottom-disc-small">NMSCash / Wallet</span></span>--}}

                            {{--<span class="bottom-simple-text">(*On all Full Pre-Paid Orders)<br> Cashback validity: 31 days</span>--}}

                        {{--</a>--}}

                    {{--</div>--}}

                {{--</div>--}}



                {{--<div class="col-sm-3">--}}

                    {{--<div class="home-single-offer-item">--}}

                        {{--<a href="" class="top-offer-part top-offer-fourth-color">--}}

                            {{--<span class="flat-offet">Extra</span>--}}

                            {{--<span class="rotate-img"><img src="{{asset(config('setting.site_img'))}}/wall-nms.png" alt=""></span>--}}

                            {{--<span class="top-head">5 <span class="top-head-perct">%</span></span>--}}

                            {{--<span class="top-dist">Discount*</span>--}}

                            {{--<span class="top-simple-text">On Prescription Drugs <br>* MINIMUM ORDER VALUE: TK.1000</span>--}}

                        {{--</a>--}}



                        {{--<a href="" class="bottom-offer-part">--}}

                            {{--<span class="bottom-head">use code <span class="bottom-head-big">shastho-sheba15</span></span>--}}

                            {{--<span class="bottom-disc">5% <span class="bottom-disc-small">NMSCash / Wallet</span></span>--}}

                            {{--<span class="bottom-simple-text">(*On all Full Pre-Paid Orders)<br> Cashback validity: 31 days</span>--}}

                        {{--</a>--}}

                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

    {{--</section>--}}



    <section class="customer-served">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="bg-served-text">

                        <h1>Customer<strong>Served</strong></h1>

                        <h3>{{$customer_served}} <span>and counting</span></h3>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="home-customer-comment-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-12 text-center">

                    <div class="features-hesd-text">

                        <h1>OUR HAPPY CUSTOMERS</h1>

                        <!-- <div class="pull-right-seeall"><a class="" href="">View All <i aria-hidden="true" class="fa fa-angle-double-right fa-1"></i></a></div> -->

                    </div>

                </div>

            </div>



            <div class="row">

                <div class="col-md-5 col-sm-6">

                    <div class="home-popup-video" title="Youtube video">

                        <a href="https://www.youtube.com/watch?v=3qyhgV0Zew0" class="bla-2"><img src="{{asset(config('setting.site_img'))}}/home-testimonial.jpg" alt=""></a>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6">

                    <div class="customer-comment-slider-active owl-carousel">

                        <div class="customer-slider-item text-center">

                            <p><span><i class="fa fa-quote-left"></i></span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

                            <span class="author">- Donec quam felis</span>

                        </div>

                        <div class="customer-slider-item text-center">

                            <p><span><i class="fa fa-quote-left"></i></span>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>

                            <span class="author">- Aenean leo</span>

                        </div>
                        
                    </div>

                </div>

            </div>

        </div>



    </section>



    <section class="mobile-content-bg-new">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-4 col-sm-6">

                    <div class="bg-wrapp-text">

                        <h1>go<span>Mobile!</span></h1>

                        <p>goMobile!

                            Get under the hood of the shastho-sheba Mobile App. Browse its rich functionality and say hello to hassle-free purchase of medicines online! Download The App</p>

                        <div class="app-logo">

                            <span>Download The App</span>

                            <div class="logo-icons">

                                <a href=""><i class="fa fa-android" aria-hidden="true"></i></a>

                                <a href=""><i class="fa fa-apple" aria-hidden="true"></i></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>





@endsection