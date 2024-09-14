@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/productDetail.css') }}">
@endpush

@section('title', 'Product Detail')

@section('content')
<div class="container">
    <div class="product-detail">
        <div class="product-images">
            <img src="{{ $product->getImageURL() }}" alt="Semangka" class="main-image">
        </div>
        <div class="product-info">
            <p class="h1">{{ $product->productDetail->productName }} {{ $product->variant }}gr</p>
            @if ( $product->stock > 0 )
            <span class="status in-stock">In Stock</span>

            @else
            <span class="status outOfStock">Out Of Stock</span>

            @endif
            <div class="price">Rp. {{ number_format($product->productPrice, 0, ',', '.') }}</div>
            <p class="description">
                {{ $product->productDetail->productDesc }}
            </p>
            @php
            $cartItem = $cartItems->firstWhere('productId', $product->productId);
            @endphp

            @if (is_null($cartItem) || $cartItem->quantity == 0)
            <!-- ADD Button -->
            <a href="{{ url('add-cart', $product->productId) }}" type="button" class="add-to-cart">ADD TO CART</a>
            @else
            <!-- Increment and Decrement Buttons -->
            <div class="quantityControl">
                <form action="{{ route('cart.decrement', $product->productId) }}" method="POST"
                    class="d-inline plesMines">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary quantity-btn">-</button>
                </form>
                <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
                <form action="{{ route('cart.increment', $product->productId) }}" method="POST"
                    class="d-inline plesMines">
                    @csrf
                    <button type="submit" class="btn btn-outline-success quantity-btn">+</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="details">
        <button class="accordion" style="font-size:1.5rem;font-weight:bold">Details</button>
        <div class="panel">
            <div class="row">
                <div class="col-sm">
                    <p><span class="label">Stock</span><span class="colon">:</span><span
                            class="value">{{$product->stock}} gr</span></p>
                </div>
                <div class="col-sm" style="border-left: 1px solid">
                    <p><span class="label">Variant</span><span class="colon">:</span><span
                            class="value">{{$product->variant}} gr</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <p><span class="label">Shelf Life</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->shelfLife}}</span></p>
                </div>
                <div class="col-sm" style="border-left: 1px solid">
                    <p><span class="label">Origin</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->origin}}</span></p>
                </div>
            </div>
        </div>

        <button class="accordion" style="font-size:1.5rem;font-weight:bold">Nutrition Information</button>
        <div class="panel">
            <div class="row">
                <div class="col-sm">
                    <p><span class="label">Calories</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->calories}} gr</span></p>
                </div>
                <div class="col-sm" style="border-left: 1px solid">
                    <p><span class="label">Fat</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->fat}} gr</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <p><span class="label">Sugar</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->sugar}} gr</span></p>
                </div>
                <div class="col-sm" style="border-left: 1px solid">
                    <p><span class="label">Carbohydrate</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->carbohydrate}} gr</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <p><span class="label">Protein</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->protein}} gr</span></p>
                </div>
                <div class="col-sm" style="border-left: 1px solid">
                    <p><span class="label">Product Category</span><span class="colon">:</span><span
                            class="value">{{$product->productDetail->productCategory}}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/productDetail.js') }}"></script>
@endsection