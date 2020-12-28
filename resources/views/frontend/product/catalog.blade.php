@extends('frontend.app')

@section('content')
    @include('frontend.components.main-slider')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h1>Catalog</h1>
            </div>
            <div class="row">

                @foreach ($products as $item)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="bd-placeholder-img card-img-top p-3">
                                <img class="img-fluid img-custom" src="" alt="First slide">
                                <div class="thumbs d-flex" style="margin-top: -100px; width: 100%">

{{--                                    @foreach ($item->product_attributes as $var_item)--}}
{{--                                        <div id="{{ $var_item->article_number }}" class="product_thumb d-flex pr-1">--}}
{{--                                            <a href="/products/{{ $var_item->id }}">--}}
{{--                                                <img class="img-thumbnail" width="75"--}}
{{--                                                     src="" alt="First slide">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}

                                </div>
                            </div>
                            <div class="card-body">
                                <p class="title_brand mb-0" style="line-height: 1.25rem"></p>
                                <p class="title_product" style="line-height: 1.25rem">
                                    <a href="/products/{{ $item->id }}"><span
                                            class="text-uppercase">{{ $item->name }}</span></a>
                                </p>
                                <div class="price mt-2 mb-2">
                                    <span class="main-price"></span>
                                    <span
                                        class="discount-price"></span>
                                </div>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
