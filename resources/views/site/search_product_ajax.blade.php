<div class="col-md-12">

    <div class="row">

        @foreach($products as $product)

        <!-- <div class="@if($id == 'search_result') col-md-6 @elseif($id == 'search_result2') col-md-12 @endif"> -->
        <div class="col-md-6">

            <?php

                $url_slug = $product->medicine_slug;

//                $url_slug= $product->category->category_slug.'/'.$url_slug;

                $url_slug2= $product->category->category_slug;

                $category = $product->category;

                if($category->parentRecursive){

//                    $url_slug= $category->parentRecursive->category_slug.'/'.$url_slug;

                    $url_slug2= $category->parentRecursive->category_slug;

                    if($category->parentRecursive->parentRecursive){

//                        $url_slug = $category->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;

                        $url_slug2 = $category->parentRecursive->parentRecursive->category_slug;

                        if($category->parentRecursive->parentRecursive->parentRecursive){

//                            $url_slug = $category->parentRecursive->parentRecursive->parentRecursive->category_slug.'/'.$url_slug;

                            $url_slug2 = $category->parentRecursive->parentRecursive->parentRecursive->category_slug;

                       }

                    }

                }

            ?>

            <a href="{{url($url_slug2.'/'.$url_slug)}}" class="serch-single-item">

                <span class="srch-item-thumb">

                    <img src="{{$product->smallPhoto}}" alt="{{$product->medicine_slug}}">

                </span>

                <span class="srch-main-content">

                    <span class="srch-item-text">{{$product->medicine_name}}

                        <span class="srch-small-text">in {{$category->category_name}} @if($category->parentRecursive) , {{$category->parentRecursive->category_name}} @endif</span>

                    </span>

                    <span class="srch-item-price">tk.{{$product->medicine_price}}</span>

                </span>

            </a>

        </div>

        @endforeach

        <div class="src-next-page-link">

            see products in <a href="{{url('search?q='.$q)}}">All departments</a> ({{$total_product}})

            {{--or in <a href="{{url('')}}">Non-Prescriptions</a>,<a href="">Prescriptions</a>--}}

        </div>

    </div>

</div>