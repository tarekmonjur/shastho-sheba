@extends('site.layouts.layout')
@section('content')

    <div class="subtitle-area">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-6">
                    <div class="subtitle-text">
                        <div class="sub-link"><a href="#">Home</a><i class="fa fa-angle-right"></i>Manufacturers</div>
                        <h1>Find Your Manufacturer List <span>just what the doctor ordered</span> </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="medicine-category-list-area">
        <div class="container container-custom">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="category-list-pagination">
                        <ul>
                            @for($i='a'; $i !='aa'; $i++)
                                <li><a @if(!in_array($i,$manufacturersAlpha)) style="color: lightgrey" @else href="#" class="prescription"  @endif>{{$i}}</a></li>
                            @endfor
                            <li><a class="last-all" href="">All</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($manufacturers as $key => $manufacturer)
                    <div class="col-sm-3 prescription_key" id="prescription_{{$key}}">
                        <div class="medicine-category-single-list">
                            <h5>{{$key}}</h5>
                            <ul>
                                @foreach($manufacturer as $minfo)
                                    <li><a href="{{url('manufacturers/'.$minfo->medicine_company_slug)}}">{{$minfo->medicine_company_name}} <span>({{$minfo->medicines->count()}})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    $(document).on('click', '.prescription', function (){
        var prescription_key = $(this).text();
        $(".prescription_key").hide();
        $('.prescription').css('color','#000');
        $(this).css('color','#4284F4');
        $("#prescription_"+prescription_key).show();
    });
</script>
@endpush