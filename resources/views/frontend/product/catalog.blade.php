@extends('layouts.frontend')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Catalog</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($products as $item)
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="card mb-4 shadow-sm">
                            <div class="bd-placeholder-img card-img-top p-3">

                                {{-- <img class="img-fluid img-custom"
                                    src="{{ isset($item->product_attributes[0]->images[0]) ? $item->product_attributes[0]->images[0]->src['small'] : asset($item->images[0]->src['full']) }}"
                                    alt=""> --}}
                                <div class="thumbs d-flex" style="width: 100%; background-color: #fff">

                                    @foreach ($colored_products as $var_item)
                                        {{ dd($colored_products)}}
                                        @if ($item->id === $key)

                                            <div id="{{ $var_item->article_number }}" class="product_thumb d-flex pr-1">
                                                <a href="/products/{{ $var_item->id }}">
                                                    @if (isset($var_item->images[0]))
                                                        <img class="img-thumbnail" width="75"
                                                            src="{{ $var_item->images[0]->src['small'] }}" alt="">
                                                    @else
                                                        <p>
                                                            {{ $var_item->article_number }}
                                                        </p>
                                                    @endif
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
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
                                    <span class="discount-price"></span>
                                </div>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
