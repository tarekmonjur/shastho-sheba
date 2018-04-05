{{--header--}}
<header id="sticky">
    <div class="mobile-nav"></div>
    <div class="header-top-section">
        <div class="container container-custom">
            <div class="row">
                <div class="col-sm-1 columm-padd-less-right">
                    <div class="logo-area">
                        <a href="{{url('/')}}"><img src="{{asset(config('setting.site_img'))}}/logo.png" alt=""></a>
                    </div>
                </div>

                <div class="col-sm-8 columm-padd-less-right columm-padd-less-left">
                    <div class="top-header-block-content">
                        <div class="col-sm-3 xs-device-hide">
                            <div class="drop-drown-category-me" id="open-menu">Shop by Category <i class="fa fa-angle-down"></i></div>

                            <div class="drop-drown-category-me" id="open-close">Shop by Category <i class="fa fa-angle-down"></i></div>
                        </div>
                        <div class="col-sm-9">
                            <div class="hide-top-form">
                                <form action="{{url('search')}}" method="get">
                                    <input type="text" sid="search_result2" class="search_product" name="q" placeholder="Search for Prescription Medicines & OTC Products...">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                                
                            </div>
                        </div>
                        <div class="searching-result" id="search_result2" style="display: none"></div>
                    </div>
                </div>

                <div class="col-sm-3 columm-padd-less-left">
                    <div class="top-contact-section">
                        <div class="top-prof">
                            <a href="#" class="shopping-cart-parent">
                                <img src="{{asset(config('setting.site_img'))}}/Call.png" alt="##">

                                <span class="shopping-table help">
                                    Need Help? 01788-630697
    						    </span>
                            </a>

                        @if($auth)
                            <span href="#" class="shopping-cart-parent">
                                <img src="{{asset(config('setting.site_img'))}}/Profile.png" alt="##">
                                <span class="shopping-table user">
                                    <ul class="list-group" style="margin:0px">
                                      <li class="list-group-item" style="border-radius: 0px"><a href="{{url('dashboard')}}">Dashboard</a></li>
                                      <li class="list-group-item" style="border-radius: 0px"><a href="{{url('promotion')}}">Promotion</a></li>
                                      <li class="list-group-item" style="border-radius: 0px"><a href="{{url('logout')}}">Log Out</a></li>
                                    </ul>
                                </span>
                            </span>
                        @else
                            <a href="{{url('/login')}}">
                                <img src="{{asset(config('setting.site_img'))}}/Profile.png" alt="##">
                            </a>
                        @endif
                        <!-- <a href="#" class="language-el">En</a> -->
                    </div>
                    <div class="top-social-links">
                            <a href=""><img src="{{asset(config('setting.site_img'))}}/Facebook.png" alt="#"></a>
                            <a href=""><img src="{{asset(config('setting.site_img'))}}/Youtube.png" alt="#"></a>
                            <a href=""><img src="{{asset(config('setting.site_img'))}}/Viber.png" alt="#"></a>
                            <a href=""><img src="{{asset(config('setting.site_img'))}}/Whatsapp.png" alt="#"></a>
                            <a href=""><img src="{{asset(config('setting.site_img'))}}/Skype.png" alt="#"></a>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-bottom-section">
        <div class="container container-custom">
            <div class="col-sm-9 columm-padd-less-left">
                <div class="bottom-form-section">
                    <form action="{{url('search')}}" method="get">
                        <input type="text" sid="search_result" class="search_product" name="q" placeholder="Search for Prescription Medicines & OTC Products...">
                        <button><i class="fa fa-search"></i> <span class="xs-device-hide"> Search</span></button>
                    </form>
                    <div class="searching-result" id="search_result" style="display: none"></div>
                </div>
            </div>
            <div class="col-sm-3 columm-padd-less-right">
                <div class="bottom-upload-perception-area">
                    <div class="or">or</div>
                    @if($auth)
                    <a href="{{url('/upload-prescription')}}">Upload Prescription</a>
                    @else
                    <a href="{{url('/login?redirect=upload')}}">Upload Prescription</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>


{{--menu--}}
<div class="menu-section">
    <div class="container container-custom">
        <div class="row">
            <div class="menu-nav-xs" id="nav">
                <nav class="navigation">
                    <ul>
                        @foreach($categories as $category)
                            @if($category->id == 1)
                            <li><a class="padd-less" href="{{url($category->category_slug)}}">{{$category->category_name}} <i class="fa fa-angle-down"></i></a>
                                <ul class="mega-menu" id="big-menu">
                                    <div class="row">
                                        <?php $cat_count_mid = ceil($category->childRecursive->count()/2);?>
                                        @foreach(array_chunk($category->childRecursive->toArray(), $cat_count_mid) as $childRecursive)
                                        <div class="col-sm-3 col-xs-12">
                                            @if($loop->iteration <= 1)
                                            <h5>By Conditions</h5>
                                            @else
                                                <br>
                                            @endif
                                            <ul>
                                                @foreach($childRecursive as $child)
                                                <li><a href="{{url($category->category_slug.'/'.$child['category_slug'])}}">{{$child['category_name']}}</a></li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                        @endforeach
                                         <a href="{{url('prescriptions')}}" class="view-menu-item-all-one">view all</a>
                                       

                                        <?php $company_count_mid = ceil($companies->count()/2);?>
                                        @foreach(array_chunk($companies->toArray(), $company_count_mid+1) as $company)
                                            <div class="col-sm-3 col-xs-12">
                                                @if($loop->iteration <= 1)
                                                    <h5>By Manufacturer</h5>
                                                @else
                                                    <br>
                                                @endif
                                                <ul>
                                                    @foreach($company as $cinfo)
                                                        <li><a href="{{url('manufacturers/'.$cinfo['medicine_company_slug'])}}">{{$cinfo['medicine_company_name']}}</a></li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        @endforeach
                                      <a href="{{url('manufacturers')}}" class="view-menu-item-all-two">view all</a>
                                    </div>
                                </ul>
                            </li>
                            @elseif($category->id == 2)
                            <li><a href="{{url($category->category_slug)}}">{{$category->category_name}} <i class="fa fa-angle-down"></i></a>
                                <ul class="small-menu" id="small-menu">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <ul>
                                                @foreach($category->childRecursive as $childs)
                                                <li><a href="{{url($category->category_slug.'/'.$childs->category_slug)}}">{{$childs->category_name}}</a>
                                                    <ul class="sub-menu-2">
                                                     @foreach($childs->childRecursive as $child )
                                                        <li><a href="{{url($category->category_slug.'/'.$childs->category_slug.'/'.$child->category_slug)}}">{{$child->category_name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
                <div class="menu-links">
                    @foreach($topCategories as $topCategory)
                        <?php $url_slug = $topCategory->category_slug;?>
                        @if($topCategory->parentRecursive)
                            <?php $url_slug= $topCategory->parentRecursive->category_slug.'/'.$url_slug;?>
                            @if($topCategory->parentRecursive->parentRecursive)
                                <?php $url_slug = $topCategory->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;?>
                                @if($topCategory->parentRecursive->parentRecursive->parentRecursive)
                                    <?php $url_slug = $topCategory->parentRecursive->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;?>
                                @endif
                            @endif
                        @endif
                        <a href="{{url($url_slug)}}">{{$topCategory->category_name}}</a>
                        @if(!$loop->last)
                        <span>|</span>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>