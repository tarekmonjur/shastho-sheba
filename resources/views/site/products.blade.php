@extends('site.layouts.layout')

@section('content')

    <div class="subtitle-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="subtitle-text">

                        <div class="sub-link">

                            <a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>

                            <a href="{{url('/non-prescriptions')}}">Non-Prescriptions</a><i class="fa fa-angle-right"></i>

                            @if(isset($slug))

                                @if(isset($slug2))

                                <a href="{{url('/non-prescriptions/'.$slug)}}">{{$slug}}</a><i class="fa fa-angle-right"></i>

                                <a href="#">{{$slug2}}</a>

                                @else

                                <a href="#">{{$slug}}</a>

                                @endif

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <div class="first-aid-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-sm-3">

                    <div class="first-aid-toogle-section">

                        @if(isset($category))
                        <div class="single-toggle-section">

                            <div data-toggle="collapse" data-target="#chkbox-content-2" class="toggle-btn-section">Category <i class="fa fa-angle-down"></i></div>

                            <div id="chkbox-content-2" class="collapse in collapse-content">

                                <form action="">

                                    @foreach($category->childRecursive as $childs)

                                        <input type="checkbox"> {{$childs->category_name}}<br>

                                        @foreach($childs->childRecursive as $child)

                                            <input type="checkbox"> {{$child->category_name}}<br>

                                        @endforeach

                                    @endforeach

                                </form>

                            </div>

                        </div>
                        @endif

                        @if(isset($manufacturers))
                        <div class="single-toggle-section">

                            <div data-toggle="collapse" data-target="#chkbox-content-3" class="toggle-btn-section">Manufacturer <i class="fa fa-angle-down"></i></div>

                            <div id="chkbox-content-3" class="collapse in collapse-content">

                                <form action="">

                                    @foreach($manufacturers as $company)

                                        <input type="checkbox"> {{$company->medicine_company_name}}<br>

                                    @endforeach

                                </form>

                            </div>

                        </div>
                        @endif

                    </div>

                </div>



                <div class="col-sm-9">

                    @if(isset($category))

                    <div class="row">

                        <div class="first-aid-features-img">

                            <img src="{{$category->mediumPhoto}}" alt="">

                        </div>

                    </div>

                    @endif

                    <div class="row">

                        <div class="first-aid-found-item">

                            <div class="pull-left" id="product_item"></div>

                            <div class="pull-right">

                                <form action="">

                                    <select>

                                        <option>Name:A-Z</option>

                                        <option>Name:A-Z</option>

                                        <option>Name:A-Z</option>

                                        <option>Name:A-Z</option>

                                    </select>

                                </form>

                            </div>

                        </div>

                    </div>

                    <div class="first-aid-single-item">

                        <div class="row first-aid-single-item-bg" id="products">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection


@push('scripts')

<script type="text/javascript">

    var products = {!! $products !!};

    $(document).ready(function(){
        randerProducts(products);
    });

</script>

@endpush