@extends('site.layouts.layout')

@section('content')



<div class="about-area terms-and-condition-area">

    <div class="container container-custom">

        <div class="row">

            <div class="col-md-6 text-left">

                <div class="sub-link about-sub-padd"><a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>Faqs</div>

            </div>

        </div>



        <div class="row">

            <div class="col-md-12">

                <div class="faqs-img">

                    <img src="{{asset(config('setting.site_img'))}}/terms.jpg" alt="">

                </div>

            </div>

        </div>



        <div class="row faqs-text-row">

            <div class="col-md-3 mid-text-right-border">

                <div class="terms-condition-text-left faqs-term-text-left">

                    <p>At shastho-sheba.com, we are dedicated to providing a seamless shopping experience to all our customers. To help guide you through your online shopping with us, we have compiled a list of frequently asked questions and provided answers below. If you don’t find your question, you are always welcome to contact us and we will get back to you as soon as possible.</p>

                </div>

            </div>



            <div class="col-md-6  mid-text-right-border">

                <div class="terms-condition-text-mid">

                    <h5>FAQs</h5>



                    <div class="faqs-hide-text-area">

                        <h4>General Questions</h4>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse1">How does Shastho Sheba work? </a>



                            <div id="collapse1" class="panel-collapse collapse ">

                                <p>You can browse our site or use our search engine to find your desired products. You can then add them to your shopping cart and place your order. </p>

                                <p>Or more conveniently, you can click “Upload Prescription” and send us a photo of your prescription. We will do the rest for you. Our expert pharmacist will call you within a short time to know the quantity of the products that you want to order. </p>

                                <p>You just let us know your address, you can also select a delivery time of your choice – and you are done!  Our representative will deliver your order right to your desired receiving address.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle"  data-toggle="collapse" href="#collapse2">How much do deliveries cost? </a>



                            <div id="collapse2"  class="panel-collapse collapse">

                                <p>There is absolutely no delivery fee for any amount of orders. However in cases there might be a small amount of charges or delivery timing compromises if the receiving address is outside of our current operational zone. We can deliver in all over the country but it is subject of a prior contract to our customer. </p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle"  data-toggle="collapse" href="#collapse3">Can I order over the phone?</a>



                            <div id="collapse3" class="panel-collapse collapse">

                                <p>Absolutely. Just call +88 01788 630 697.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse4">How can I contact you? </a>



                            <div id="collapse4" class="panel-collapse collapse">

                                <p>You can always call +88 01788 630 697 or mail us at cs@shastho-sheba.com</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse5">How long do the deliveries take? </a>



                            <div id="collapse5" class="panel-collapse collapse">

                                <p>We are serving with 30 minutes Delivery Service to Uttara currently. But we will soon be expanding our services to Tongi, Mirpur, Banani, Gulshan, Baridhara, Badda, Mohakhali, Banasree, Moghbazar, Malibag, Kallyanpur, Shyamoli, Pallabi and Mohammedpur. For the rest of the Dhaka city we are currently delivering within 4-5 hours.  You can also specify your convenient time and we will send the products during that time.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle"  data-toggle="collapse" href="#collapse6">What are your delivery hours?</a>



                            <div id="collapse6" class="panel-collapse collapse">

                                <p>We deliver from 8 am to 10 pm currently. Very soon it will be 24/7. You can also choose a timing that is convenient to you.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse7">How do I know when my order is here?</a>



                            <div id="collapse7" class="panel-collapse collapse">

                                <p>Our service representative will call you as soon as they are at your address.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse8">How do I pay?</a>



                            <div id="collapse8" class="panel-collapse collapse">

                                <p> We accept cash on delivery. Our Online Card payment service is underway. For cash, don’t worry, our representatives should always carry enough changes.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse9">Do you serve my area?</a>



                            <div id="collapse9" class="panel-collapse collapse">

                                <p>We are currently serving only at Uttara. But we will soon be expanding our services to Tongi, Mirpur, Banani, Gulshan, Baridhara, Badda, Mohakhali, Banasree, Moghbazar, Malibag, Kallyanpur, Shyamoli, Pallabi and Mohammedpur.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse10">How do I refer someone?</a>



                            <div id="collapse10" class="panel-collapse collapse">

                                <p>To refer a friend or family member go to https://shastho-sheba.com/referral and submit their mobile number or email address. Your referred person will receive a SMS or an email from us with a 99tk discount. Once they complete their first order with us you will receive a 99tk credit in your account.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse11">I can’t find the product I am looking for. What do I do?</a>



                            <div id="collapse11" class="panel-collapse collapse">

                                <p>We are always open to new suggestions and will add items to our inventory just for you. There is a "Product Request" feature that you can use to inform us for your special requirements. You can always call +88 01788 630 697 or mail us at cs@shastho-sheba.com to add an item to our inventory.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse12">My order is wrong. What do I do?</a>



                            <div id="collapse12" class="panel-collapse collapse">

                                <p>Immediately call +88 01788 630 697 and let us know the issue.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse13">What if the item is out of stock?</a>



                            <div id="collapse13" class="panel-collapse collapse">

                                <p>We hold our own inventory, so we rarely run of out stock. However, we will try our best to source what you need. If we cannot find it, we will call you and let you know what substitutes are available.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse14">What happens during a strike or bad weather?</a>



                            <div id="collapse14" class="panel-collapse collapse">

                                <p>We work during any sort of strike or bad weather. That’s our dedication to all of our valuable clients.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse15">Why should we buy from you when I have a store nearby?</a>



                            <div id="collapse15" class="panel-collapse collapse">

                                <p>Well, that is up to you but you can also spend your valuable time with your family in the time of need. Heavy traffic, lack of parking, monsoons, shop closed, forgetfulness, unavailability… these are some of the very common reasons that could lead to skipping of vital medications. Since taking medicines regularly is a critical component of managing chronic medical conditions, its best not to run out of the essentials. Have your items delivered to your house for free and conveniently even if you are stuck in a meeting of busy working for your family. Our prices are sometimes lower than that of major stores in the city. We also carry a larger variety than the average corner-store. </p>

                                <p>And best of all, the notification of you running low on a medicine can really save you from trouble at middle of the night when the only option might be going to a hospital. There is really no reason to not buy from us.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse16">What about the prices?</a>



                            <div id="collapse16" class="panel-collapse collapse">

                                <p>Our prices are our own but we try our best to offer them to you at or below market prices. Our prices are the same as the local market and we are working hard to get them even lower. If you feel that any product is priced unfairly, please let us know.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse17">How do you deliver?</a>



                            <div id="collapse17" class="panel-collapse collapse">

                                <p>We use our own fleet to deliver. Our goal is to deliver the products to your address as fast as possible. As we seriously care about your health, we know that timing can be very crucial in the times of need.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse18">What is your policy on refunds?</a>



                            <div id="collapse18" class="panel-collapse collapse">

                                <p>We do our best to ensure that you are completely satisfied with our products. And we are happy to issue a full refund based on the conditions listed below:</p>
                                
                                <ul style="list-style-type: circle; margin-left: 50px">
                                    <li>you received a defective item</li>
                                    <li>the ordered item(s) is lost or damaged during transit</li>
                                    <li>the ordered item(s) is past its expiry date</li>
                                </ul>

                                <p>Please note: Mode of refund may vary depending on circumstances. If the mode of refund is by Credit/Debit Card or Internet Banking, please allow 7 to 10 working days for the credit to appear in your account. While we regret any inconvenience caused by this time frame, it is the bank's policy that delays the refund timing and we have no control over that.</p>

                                <p>Please contact us at +88 01788 630 697 or mail us at cs@shastho-sheba.com if you want to return an item.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse19">What about quality?</a>



                            <div id="collapse19" class="panel-collapse collapse">

                                <p>We do our best to ensure that the products you order are delivered according to your specifications. However, should you receive an incomplete order, damaged or incorrect product(s), please notify our Customer Support immediately or within 7 working days of receiving the products, to ensure prompt resolution. Please note that we will not accept liability for such delivery issues if you fail to notify us within 5 working days of receipt.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse20">How are you sourcing your products?</a>



                            <div id="collapse20" class="panel-collapse collapse">

                                <p>We have and ensure our quality deals with wholesalers, manufacturers and importers. We only sell authentic products.</p>

                            </div>

                        </div>

                    </div>



<!--                     <div class="faqs-hide-text-area">

                        <h4>Medicine Questions</h4>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse21">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse21" class="panel-collapse collapse ">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse22">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse22" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse23">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse23" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse24">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse24" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse25">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse25" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse26">What do the following statuses IN STOCK and AVAILABLE on any product page mean? </a>



                            <div id="collapse26" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse27">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse27" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse28">What do the following statuses IN STOCK and AVAILABLE on any product page mean? </a>



                            <div id="collapse8" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse29">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse29" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse20">What do the following statuses IN STOCK and AVAILABLE on any product page mean? </a>



                            <div id="collapse20" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                    </div>





                    <div class="faqs-hide-text-area">

                        <h4>Ordering Questions</h4>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse31">How is my order packaged? </a>



                            <div id="collapse31" class="panel-collapse collapse ">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse32">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse32" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse33">How is my order packaged? </a>



                            <div id="collapse33" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse34">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse34" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse35">How is my order packaged? </a>



                            <div id="collapse35" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse36">Are there any other hidden charges? </a>



                            <div id="collapse36" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse37">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse37" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse38">Are there any other hidden charges? </a>



                            <div id="collapse38" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse39">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse39" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse30">Are there any other hidden charges? </a>



                            <div id="collapse30" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                    </div>



                    <div class="faqs-hide-text-area">

                        <h4>Delivery Questions</h4>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse41">How is my order packaged? </a>



                            <div id="collapse41" class="panel-collapse collapse ">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse42">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse42" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse43">How is my order packaged? </a>



                            <div id="collapse43" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse44">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse44" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse45">How is my order packaged? </a>



                            <div id="collapse45" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse46">Are there any other hidden charges? </a>



                            <div id="collapse46" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse47">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse47" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse48">Are there any other hidden charges? </a>



                            <div id="collapse48" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse49">Can I know whether your Pharmacy is licensed? </a>



                            <div id="collapse49" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                        <div class="single-faqs-answer">

                            <a class="accordion-toggle" data-toggle="collapse" href="#collapse40">Are there any other hidden charges? </a>



                            <div id="collapse40" class="panel-collapse collapse">

                                <p>Certainly, we are a licensed pharmacy offering prescription medications online. Our licence number: 3184/MIII/20, 3188/MIII/21, 5509/MIII/20B, 5389/MIII/21-B.</p>

                            </div>

                        </div>

                    </div> -->

                </div>

            </div>



            <div class="col-md-3 text-center">

                <div class="terms-conditions-left">

                    <img src="{{asset(config('setting.site_img'))}}/terms-right-icon.png" alt="">

                    <p>Excellence, Expertise and Experience in Comprehensive Health Care.</p>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection