@extends('site.layouts.layout')
@section('content')

    <div class="subtitle-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="subtitle-text">
                        <div class="sub-link">
                            <a href="">Home</a><i class="fa fa-angle-right"></i> offer
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offer-area-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="offer-feature-img">
                        <img src="{{asset(config('setting.site_img'))}}/static-banner1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center toogle-btn-expend">
                    <h2 class="offers-header-text">Extra 5% NMSCash / Wallet (*On all Full Pre-Paid Orders) Cashback validity: 31 days</h2>
                    <div class="col-md-4">
                        <div class="offers-terms-area">
                            <div class="offers-circle-text">
                                <h1>15% <span>Discount*</span></h1>
                            </div>
                            <div class="offers-text-content">
                                <span>On Prescription Drugs</span>
                                <h6>Use Code: shastho-shaba15</h6>
                                <span>*Minimum Order Value: TK. 1000</span>
                            </div>
                        </div>
                        <a class="accordion-toggle btn-custom-hide-1" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Terms & Conditions <i class="fa fa-angle-down"></i></a>
                    </div>
                    <div class="col-md-4">
                        <div class="offers-terms-area offers-terms-area-bg-2">
                            <div class="offers-circle-text">
                                <div class="off-trm-flat-text">flat</div>
                                <h1>15% <span>Discount*</span></h1>
                            </div>
                            <div class="offers-text-content">
                                <span>On Prescription Drugs</span>
                                <h6>Use Code: shastho-shaba15</h6>
                                <span>*Minimum Order Value: TK. 1000</span>
                            </div>
                        </div>
                        <a class="accordion-toggle btn-custom-hide-2" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Terms & Conditions <i class="fa fa-angle-down"></i></a>
                    </div>
                    <div class="col-md-4">
                        <div class="offers-terms-area offers-terms-area-bg-3">
                            <div class="offers-circle-text">
                                <div class="off-trm-flat-text-rotate">flat</div>
                                <div class="for-nw-cstmers">for new customers</div>
                                <h1>15% <span>Discount*</span></h1>
                            </div>
                            <div class="offers-text-content">
                                <span>On Prescription Drugs</span>
                                <h6>Use Code: shastho-shaba15</h6>
                                <span>*Minimum Order Value: TK. 1000</span>
                            </div>
                        </div>
                        <a class="accordion-toggle btn-custom-hide-3" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Terms & Conditions <i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="terms-conditions-hide-area">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">

                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>The 15% Discount is valid on prescription drugs only.</li>
                                        <li>This offer is valid on a minimum order value of TK. 1000.</li>
                                        <li>Enter the promo code shastho-shaba15 at checkout to receive the 15% discount plus FREE SHIPPING!</li>
                                        <li>Please Note: Some of the selected medicines are NOT eligible for a 15% coupon discount, and it is indicated on the respective product pages as "Only 10% discount applies to this medicine."</li>
                                        <li>If the order has both prescription medicines and non-prescription products, then the discount will be applicable ONLY for the total value of prescription medicines.</li>
                                        <li>This offer is valid on orders placed via shastho-shaba.com as well as shastho-shaba app.</li>
                                        <li>This offer is not valid towards previous purchases.</li>
                                        <li>This offer is not redeemable for cash or credit.</li>
                                        <li>This offer cannot be used in conjunction with any other offeTK.</li>
                                        <li>This offer excludes delivery charges.</li>
                                        <li>The 5% NMSCash / Wallet offer is applicable on Pre-paid orders only (not valid if partly paid by COD). Also, the cashback will NOT apply on partial or full Wallet payment.</li>
                                        <li>The 5% NMSCash / Wallet will be credited in the customer's shastho-shaba.com e-Wallet after the order is delivered.</li>
                                        <li>The 5% NMSCash / Wallet amount can be redeemed against ANY purchases on our website.</li>
                                        <li>The 5% NMSCash / Wallet is non-refundable, non-replaceable, and non-transferrable under any circumstances.</li>
                                        <li>shastho-shaba.com reserves the right to cancel, change or substitute the 5% NMSCash / Wallet offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>shastho-shaba.com reserves the right to discontinue or modify this offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>By availing this offer, it is deemed that the customer has agreed to all the terms & conditions mentioned herein.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">

                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>The 15% Discount is valid on prescription drugs only.</li>
                                        <li>This offer is valid on a minimum order value of TK. 1000.</li>
                                        <li>Enter the promo code shastho-shaba15 at checkout to receive the 15% discount plus FREE SHIPPING!</li>
                                        <li>Please Note: Some of the selected medicines are NOT eligible for a 15% coupon discount, and it is indicated on the respective product pages as "Only 10% discount applies to this medicine."</li>
                                        <li>If the order has both prescription medicines and non-prescription products, then the discount will be applicable ONLY for the total value of prescription medicines.</li>
                                        <li>This offer is valid on orders placed via shastho-shaba.com as well as shastho-shaba app.</li>
                                        <li>This offer is not valid towards previous purchases.</li>
                                        <li>This offer is not redeemable for cash or credit.</li>
                                        <li>This offer cannot be used in conjunction with any other offeTK.</li>
                                        <li>This offer excludes delivery charges.</li>
                                        <li>The 5% NMSCash / Wallet offer is applicable on Pre-paid orders only (not valid if partly paid by COD). Also, the cashback will NOT apply on partial or full Wallet payment.</li>
                                        <li>The 5% NMSCash / Wallet will be credited in the customer's shastho-shaba.com e-Wallet after the order is delivered.</li>
                                        <li>The 5% NMSCash / Wallet amount can be redeemed against ANY purchases on our website.</li>
                                        <li>The 5% NMSCash / Wallet is non-refundable, non-replaceable, and non-transferrable under any circumstances.</li>
                                        <li>shastho-shaba.com reserves the right to cancel, change or substitute the 5% NMSCash / Wallet offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>shastho-shaba.com reserves the right to discontinue or modify this offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>By availing this offer, it is deemed that the customer has agreed to all the terms & conditions mentioned herein.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">

                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li>The 15% Discount is valid on prescription drugs only.</li>
                                        <li>This offer is valid on a minimum order value of TK. 1000.</li>
                                        <li>Enter the promo code shastho-shaba15 at checkout to receive the 15% discount plus FREE SHIPPING!</li>
                                        <li>Please Note: Some of the selected medicines are NOT eligible for a 15% coupon discount, and it is indicated on the respective product pages as "Only 10% discount applies to this medicine."</li>
                                        <li>If the order has both prescription medicines and non-prescription products, then the discount will be applicable ONLY for the total value of prescription medicines.</li>
                                        <li>This offer is valid on orders placed via shastho-shaba.com as well as shastho-shaba app.</li>
                                        <li>This offer is not valid towards previous purchases.</li>
                                        <li>This offer is not redeemable for cash or credit.</li>
                                        <li>This offer cannot be used in conjunction with any other offeTK.</li>
                                        <li>This offer excludes delivery charges.</li>
                                        <li>The 5% NMSCash / Wallet offer is applicable on Pre-paid orders only (not valid if partly paid by COD). Also, the cashback will NOT apply on partial or full Wallet payment.</li>
                                        <li>The 5% NMSCash / Wallet will be credited in the customer's shastho-shaba.com e-Wallet after the order is delivered.</li>
                                        <li>The 5% NMSCash / Wallet amount can be redeemed against ANY purchases on our website.</li>
                                        <li>The 5% NMSCash / Wallet is non-refundable, non-replaceable, and non-transferrable under any circumstances.</li>
                                        <li>shastho-shaba.com reserves the right to cancel, change or substitute the 5% NMSCash / Wallet offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>shastho-shaba.com reserves the right to discontinue or modify this offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                        <li>By availing this offer, it is deemed that the customer has agreed to all the terms & conditions mentioned herein.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row fournumber-collaspe">
                <div class="col-md-12">
                    <div class="terms-img">
                        <img src="{{asset(config('setting.site_img'))}}/static-banner1.jpg" alt="">
                        <a class="btn-custom-hide-4" data-toggle="collapse" href="#collapsefour">Terms & Conditions <i class="fa fa-angle-down"></i></a>
                        <div class="terms-conditions-hide-area">
                            <div id="collapsefour" class="extra-collapse collapse">
                                <ul>
                                    <li>The 15% Discount is valid on prescription drugs only.</li>
                                    <li>This offer is valid on a minimum order value of TK. 1000.</li>
                                    <li>Enter the promo code shastho-shaba15 at checkout to receive the 15% discount plus FREE SHIPPING!</li>
                                    <li>Please Note: Some of the selected medicines are NOT eligible for a 15% coupon discount, and it is indicated on the respective product pages as "Only 10% discount applies to this medicine."</li>
                                    <li>If the order has both prescription medicines and non-prescription products, then the discount will be applicable ONLY for the total value of prescription medicines.</li>
                                    <li>This offer is valid on orders placed via shastho-shaba.com as well as shastho-shaba app.</li>
                                    <li>This offer is not valid towards previous purchases.</li>
                                    <li>This offer is not redeemable for cash or credit.</li>
                                    <li>This offer cannot be used in conjunction with any other offeTK.</li>
                                    <li>This offer excludes delivery charges.</li>
                                    <li>The 5% NMSCash / Wallet offer is applicable on Pre-paid orders only (not valid if partly paid by COD). Also, the cashback will NOT apply on partial or full Wallet payment.</li>
                                    <li>The 5% NMSCash / Wallet will be credited in the customer's shastho-shaba.com e-Wallet after the order is delivered.</li>
                                    <li>The 5% NMSCash / Wallet amount can be redeemed against ANY purchases on our website.</li>
                                    <li>The 5% NMSCash / Wallet is non-refundable, non-replaceable, and non-transferrable under any circumstances.</li>
                                    <li>shastho-shaba.com reserves the right to cancel, change or substitute the 5% NMSCash / Wallet offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                    <li>shastho-shaba.com reserves the right to discontinue or modify this offer at any time without prior notice and the same is at the sole discretion of the company.</li>
                                    <li>By availing this offer, it is deemed that the customer has agreed to all the terms & conditions mentioned herein.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection