@extends('site.layouts.layout')

@section('content')

    <div class="subtitle-area">

        <div class="container container-custom">

            <div class="row">

                <div class="col-md-6">

                    <div class="subtitle-text">

                        <div class="sub-link">

                            <a href="{{url('/')}}">Home</a><i class="fa fa-angle-right"></i>

                            <a href="#">Search Medicine</a>

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

                        <div class="single-toggle-section">

                            <div data-toggle="collapse" data-target="#chkbox-content-2" class="toggle-btn-section">Category <i class="fa fa-angle-down"></i></div>

                            <div id="chkbox-content-2" class="collapse in collapse-content">

                                <form action="">

                                    @foreach($categorys as $category)

                                        <input type="checkbox"> {{$category->category_name}}<br>

                                        @foreach($category->childRecursive as $child)

                                            <input type="checkbox"> {{$child->category_name}}<br>

                                        @endforeach

                                    @endforeach

                                </form>

                            </div>

                        </div>

                        <div class="single-toggle-section">

                            <div data-toggle="collapse" data-target="#chkbox-content-3" class="toggle-btn-section">Manufacturer <i class="fa fa-angle-down"></i></div>

                            <div id="chkbox-content-3" class="collapse in collapse-content">

                                <form action="">

                                    @foreach($companies as $company)

                                        <input type="checkbox"> {{$company->medicine_company_name}}<br>

                                    @endforeach

                                </form>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="col-sm-9">

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

    var products = '<?php echo $products;?>';
    products = JSON.parse(products);

    function randerProducts(products)
    {
        var html = "";

        document.getElementById('product_item').innerHTML = products.length + " items found";

        for(index in products)
        {
            var product = products[index];

            html += '<div class="col-md-4">'+

                '<div class="first-aid-single-product">' +

                    '<div class="features-single-item" style="min-height:382px">' +

                        '<a href="'+baseUrl+'/non-prescriptions/'+product.medicine_slug+'" class="offer-buget-area">';

                        if(product.offer_percent){

                            html += '<div class="offer-badge"></div>'+

                                '<div class="b-text">'+ product.offer_percent + '<span class="buget-per">%</span><span class="off-offer">Off</span></div>';
                        }

                        if(product.medicine_image){
                            html += '<div class="slide-img-wrapper"><img src="'+baseUrl+'/files/medicine/medium/'+product.medicine_image+'" alt=""></div>';
                        }else{
                            html += '<div class="slide-img-wrapper"><img src="'+baseUrl+'/assets/site/img/medicine.jpg" alt=""></div>';
                        }

                         html += '</a>'+

                        '<div class="features-text-best">'+

                            '<span class="pro-name">'+product.medicine_name+'</span>'+

                            '<span class="price-text">';

                            if(product.offer_percent){
                                html += '<del>TK.'+product.medicine_price+'</del>'+
                                'TK.'+ (product.medicine_price - ((product.medicine_price * product.offer_percent) /100)).toFixed(2) +'</span><br>';
                            }else{
                                html += 'TK.'+product.medicine_price+'</span><br>';
                            }

                            html += '<span class="instock">In Stock</span>'+

                            '<div class="view-del"><a href="#" onclick="addToCart('+product.id+')">Add to Cart</a></div>'+

                        '</div>'+

                    '</div>'+

                '</div>'+

            '</div>';
        }
        document.getElementById('products').innerHTML += html;
    }


    function getProducts(){

    }


    $(document).ready(function(){
        randerProducts(products);
    });

</script>

@endpush