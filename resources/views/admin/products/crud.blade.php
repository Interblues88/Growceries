@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/adminCRUD.css') }}">
@endpush

@section('title', 'Products')

@section('content')

<div class="container">
    <div class="searchContainer">
        <form method="GET" action="{{ route('admin.searchProduct') }}" style="width: 100%;text-align:center;">
            <p class="searchTitle">Find product Here ...</p>
            <input type="text" name="search" placeholder="Input product id here..." class="searchField"
                id="searchField" value="{{ isset($search) ? $search : '' }}">
        </form>
        {{-- <p class="searchTitle">Find Our Product Here ...</p> --}}
        {{-- <form action="{{route('admin.searchProduct')}}" method="GET"> --}}
            {{-- <input type="text" placeholder="Input product code here..." class="searchField" id ="searchField" oninput=searchFunction($product)> --}}
        {{-- </form> --}}
    </div>
    <div class="productListContainer">
        <p class="productListTitle">Product List</p>
        @foreach ($products as $product)
        <div class="productUnit">
            <div class="unitTop">
                <div class="topLeft">
                    <img src={{asset($product->image )}} alt="">
                </div>
                <div class="topMid">
                    <p class="productName">{{$product->productName}}</p>
                    <p class="productStock">Stock : {{$product->stock}}</p>
                </div>
                <div class="topRight">
                    <button class="viewDetailsButton" onclick="dropDownFunction( {{ $product->productId }} );">Details</button>
                </div>
            </div>
            <div class="unitBottom" id="{{$product->productId}}">
                <div class="bottomUp">
                    <p class="informationTitle">Description</p>
                    <p class="description">{{$product->productDetail->productDesc}}</p>
                    <P class="informationTitle">Product Information</P>
                    <div class="productInformation">
                        <p class="productInformationTitle">Product Origin</p>
                        <p> : </p>
                        <p class="productInformationDesc">{{$product->productDetail->origin}}</p>
                    </div>
                    <div class="productInformation">
                        <p class="productInformationTitle">Nutrition Details</p>
                        <p> : </p>
                        <p class="productInformationDesc">Calories ({{$product->productDetail->calories}} gr),
                            Fat ({{$product->productDetail->fat}} gr),
                            Sugar ({{$product->productDetail->sugar}} gr),
                            Carbohydrate ({{$product->productDetail->carbohydrate}} gr),
                            {{-- {{-- Protein ({{$product->productDetail->protein}} gr) --}}
                        </p>
                    </div>
                    <div class="productInformation">
                        <p class="productInformationTitle">Shelf Life</p>
                        <p> : </p>
                        <p class="productInformationDesc">{{$product->productDetail->shelfLife}}</p>
                    </div>
                    <P class="informationTitle">Price</P>
                    <p class="productInformationDesc">Rp. {{$product->productPrice}}</p>
                </div>
                <div class="bottomDown">
                    <a class="editProductButton" href="{{ route('admin.editProduct', $product->productId) }}">Edit Product</a>
                    <a class="deleteProductButton" href="{{ route('admin.delete', $product->productId) }}">Delete Product</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/admin/crud.js') }}"></script>
@endsection
