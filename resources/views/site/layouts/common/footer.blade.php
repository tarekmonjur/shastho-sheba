<footer class="footer">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-2">

                <div class="footer-ist-step">

                    <h4>Company Information</h4>

                    <ul>

                        <li><a href="{{url('/about')}}"> About Us</a></li>

                        <li><a href=""> Careers</a></li>

                        <li><a href=""> Customers Speak</a></li>

                        <li><a href=""> In the News</a></li>

                        <li><a href="{{url('/fags')}}"> FAQs</a></li>

                        <li><a href=""> Reward Points</a></li>

                        <li><a href="{{url('/login?redirect=refer')}}"> Refer & Earn</a></li>

                        <li><a href="{{url('/terms-and-conditions')}}"> Terms and Conditions</a></li>

                        <li><a href=""> Privacy Policy</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-2">

                <div class="footer-ist-step">

                    <h4>Prescription Drugs</h4>

                    <ul>

                        <li><a href="{{url('/prescriptions')}}">Browse by A-Z</a></li>

                        <li><a href="{{url('/manufacturers')}}">Browse by Manufacturers</a></li>

                    </ul>
                    @if($auth)
                    <span class="upload-perpection"><a href="{{url('/upload-prescription')}}">Upload Prescription</a></span>
                    @else
                    <span class="upload-perpection"><a href="{{url('/login?redirect=upload')}}">Upload Prescription</a></span>
                    @endif

                    <h4>Need Help?</h4>

                    <ul class="help-area">

                        <li><a href=""><i class="fa fa-phone"></i> 01788-630697</a></li>

                        <li><a href=""><i class="fa fa-envelope-open-o"></i> Write to us </a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-2">

                <div class="footer-ist-step">

                    <h4>Category</h4>

                    <ul>

                        <?php

                        foreach($featureCategories as $featureCategory){

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

                            <li><a href="{{url($url_slug)}}">{{$featureCategory->category_name}}</a></li>

                        <?php }?>

                        <li><a class="download-font" href=""><i class="fa fa-download same-icon"></i> Download App</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-md-3">

                <div class="footer-ist-step">

                    <h4>Stay In Touch</h4>

                    <div class="social-links">

                        <span>Follw us</span>

                        <a href=""><i class="fa fa-facebook"></i></a>

                        <a href=""><i class="fa fa-twitter"></i></a>

                        <a href=""><i class="fa fa-youtube-play"></i></a>

                        <a href=""><i class="fa fa-google-plus"></i></a>

                        <a href=""><i class="fa fa-linkedin"></i></a>

                    </div>

                    <div class="mobile-app">

                        <span>Stay Mobile</span>

                        <a href=""><i class="fa fa-android" aria-hidden="true"></i></a>

                        <a href=""><i class="fa fa-apple" aria-hidden="true"></i></a>

                    </div>

                    <div class="footer-form">

                        <p>Get a free subscription to our health and fitness tip and stay tuned to our latest offers </p>

                        <form action="">

                            <input type="text" placeholder="Enter your email address">

                            <input type="submit" value="Go">

                        </form>

                    </div>

                </div>

            </div>



            <div class="col-md-3">

                <div class="footer-ist-step">

                    <h4>CARE WITH COMPASSION</h4>

                    <p>shastho-sheba.com, A Bangladeshi online pharmacy, is brought to you by the Shastho Sheba – one of Bangladesh's most technologically advanced healthcare assistance system, with years’ experience in dispensing quality care.<br><a href="{{url('/about')}}">Read more <i class="fa fa-angle-right"></i></a></p>

                    <div class="payment-option">

                        <h4>Payment Options</h4>

                        <img src="{{asset(config('setting.site_img'))}}/payment-1.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-2.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-3.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-4.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-5.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-6.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-7.png" alt="">

                        <img src="{{asset(config('setting.site_img'))}}/payment-8.png" alt="">

                    </div>

                </div>

            </div>



        </div>

    </div>

</footer>



<div class="copy-right-area">

    <div class="container">

        <div class="row">

            <div class="pull-left">

                Copyright © 2018 Shastho Sheba

                <span>All Rights Reserved.</span>

            </div>

            <div class="pull-right site-terms">



                <a href="">Sitemap</a> | <a href="">Privacy Policy</a> | <a href="{{url('/terms-and-conditions')}}">Terms of use</a>

            </div>

        </div>

    </div>

</div>