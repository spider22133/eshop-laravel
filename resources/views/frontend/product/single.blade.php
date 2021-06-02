@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
       
        @foreach ( $product->images as $image )
            <img src="{{ $image->src['full'] }}" alt="">
        @endforeach
    </div>
@endsection
