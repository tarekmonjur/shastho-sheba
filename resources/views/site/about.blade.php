@extends('site.layouts.layout')

@section('content')



<div class="about-area">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-6 text-left">

                <div class="sub-link about-sub-padd"><a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>About Us</div>

            </div>

        </div>



        <div class="row">

            <div class="col-md-12">

                <div class="about-img">

                    <img src="{{asset(config('setting.site_img'))}}/slide-1.jpg" alt="">

                </div>

            </div>

        </div>



        <div class="row about-text-row">

            <div class="col-md-3 text-right about-text-left-border">

                <div class="about-left-text">

                    <h1>YOUR TRUSTED<br>HEALTH CARE<br>PARTNER</h1>

                    <h2>FOR CARE<br>WITH<br>COMPASSION</h2>

                </div>

            </div>

            <div class="col-md-6 mid-text-right-border">

                <div class="about-main-text-mid">

                    <h5>About Us</h5>

                    <div class="about-target-text">

                        <span class="target-text-head">Who we are - bangladeshi most convenient online pharmacy</span>

                        <p>Shastho Sheba is a Bangladeshi convenient online pharmacy and medi-care assistance system. Shastho-sheba.com is the product of Shastho Sheba with years of experience in dispensing quality medicines. At shastho-sheba.com, we help you look after your own health effortlessly, digitally as well as take care of your loved ones wherever they may reside in Bangladesh. You can buy and send medicines from any corner of the country - with just a few clicks.

                        </p>

                    </div>

                    <div class="about-target-text">

                        <span class="target-text-head">WHAT WE DO</span>

                        <p>We offer fast online access to medicines with convenience and free home delivery.</p>

                        <p>

                            At Shastho Sheba, we are committed to deliver widest possible range of prescription medicines and other health care products free and conveniently all across the country. Even small cities or towns and rural villages can now have access to the latest medicines. Since our various offers buyers can expect significant savings too!

                        </p>

                    </div>



                    <div class="about-text-step">

                        <!-- <div class="about-icon"><img src="{{asset(config('setting.site_img'))}}/about-icon-1.png" alt=""></div> -->

                        <div class="about-text-step-head">CONVENIENCE</div>

                        <p>Heavy traffic, lack of parking, monsoons, shop closed, forgetfulness, unavailablity… these are some of the very common reasons that could lead to skipping of vital medications. Since taking medicines regularly is a critical component of managing chronic medical conditions, its best not to run out of the essentials.</p>

                        <p>Just log on to shastho-sheba.com, place your order online and have your medicines delivered to you – without leaving the comfort of your home, Absolutely FREE of any delivery charges. For our clients’ ease we developed a system for one click uploading of prescription to have it digitally profiled.</p>

                        <p>What’s more, with easy access to reliable drug information, you get to know all about your medicine at shastho-sheba.com, and once you’re a Shastho Sheba customer, you’ll get regular refill reminders, so you’ll never again come up short of medicines. And that's just the start.</p>

                    </div>



                    <div class="about-text-step">

                        <!-- <div class="about-icon"><img src="{{asset(config('setting.site_img'))}}/about-icon-3.png" alt=""></div> -->

                        <div class="about-text-step-head">ONE-STOP SHOP</div>

                        <p>At shastho-sheba.com, we not only provide you with a wide range of medicines listed under various categories, we also offer a wide choice of OTC products including wellness products, vitamins, diet/fitness supplements, herbal products, pain relievers, diabetic care kits, baby/mother care products, beauty care products, Skin care products, surgical and medical supplies.</p>

                    </div>

                    <div class="about-text-step">

                        <!-- <div class="about-icon"><img src="{{asset(config('setting.site_img'))}}/about-icon-4.png" alt=""></div> -->

                        <div class="about-text-step-head">TRUST</div>

                        <p>shastho-sheba.com wishes to continue a legacy of years of success in the pharmaceutical industry. We are committed to provide safe, reliable and affordable medicines as well as a customer service philosophy that is worthy of our valued customers’ loyalty. We offer state of the art superior online shopping experience.</p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="about-text-right">

                    <div class="quote-mark">

                        <i class="fa-2x fa fa-quote-left"></i>

                    </div>

                    <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>

                    <span class="about-author">- Maecenas nec</span>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection