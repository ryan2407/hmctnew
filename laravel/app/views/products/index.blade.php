@extends('layouts.main')

@section('title')
    Camper Trailer Hire Brisbane - Hire My Camper Trailer - Our Camper Trailers
@endsection

@section('description')
    See our range of camper trailers that we have available for hire in the Brisbane Metro area
@endsection

@section('content')
<div class="container">
    <h1>All Products</h1>
    @if($products)
        <div class="products">
            @foreach($products as $product)
                <div class="camper">
                    @if($product->product_images)
                        <a href="{{ route('show.product', ['id' => $product->id]) }}">
                            <img src="/uploads/{{ unserialize($product->product_images)[0] }}">
                        </a>
                    @endif
                    <h2>{{ $product->product_name }}</h2>
                    <h3 class="red">{{ money($product->product_cost) }} per day</h3>
                    <p>{{ $product->excerpt }}</p>
                    <a class="book" href="{{ route('show.product', ['id' => $product->id]) }}">Read More</a>
                </div>
            @endforeach
        </div>
    @endif
    <div style="clear: both;"></div>
</div>

@endsection
