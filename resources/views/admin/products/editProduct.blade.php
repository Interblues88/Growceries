@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/addProduct.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Admin | Edit Products Page')

@section('content')
    <p class="addProductTitle">Edit Product</p>
    <div class="addProductContainer">
        <form action="{{ route('admin.updateProduct', ['product' => $product]) }}" method="POST">
            @csrf
            @method('PUT')
            <input name="id" type="text" class="hidden" value="{{ $product->productId }}">
            <label for="productName" class="label">Product Name</label><br>
            <input class="inputNormal" name="productName" type="text" id="productName" value="{{ $product->productDetail->productName }}">
            @error('productName')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="productPrice">Product Price</label><br>
            <input class="inputNormal" name="productPrice" type="tel" id="productPrice"
            value="{{ $product->productPrice }}">
            @error('productPrice')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="stock">Stock</label><br>
            <input class="inputNormal" name="stock" type="tel" id="stock" value="{{ $product->stock }}">
            @error('stock')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="variant">Variant</label><br>
            <input class="inputNormal" name="variant" type="text" id="variant" value="{{ $product->variant }}">
            @error('variant')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="calories">Product Origin</label><br>
            <input class="inputNormal" name="origin" type="tel" id="origin" value="{{ $product->productDetail->origin }}">
            @error('origin')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            <p class="label">Nutrition Details</p>
            <div class="formRow">
                <div class="formColumn">
                    <label for="calories" class="miniLabel">Calories</label><br>
                    <input class="miniInput" name="calories" type="tel" id="calories" value="{{ $product->productDetail->calories }}">
                    @error('calories')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>

                    <label for="fat" class="miniLabel">Fat</label><br>
                    <input class="miniInput" name="fat" type="tel" id="fat" value="{{ $product->productDetail->fat }}">
                    @error('fat')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
                <div class="formColumn">
                    <label for="sugar" class="miniLabel">Sugar</label><br>
                    <input class="miniInput" name="sugar" type="tel" id="sugar" value="{{ $product->productDetail->sugar }}">
                    @error('sugar')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>

                    <label for="carbohydrate" class="miniLabel">Carbohydrate</label><br>
                    <input class="miniInput" name="carbohydrate" type="tel" id="carbohydrate"
                    value="{{ $product->productDetail->carbohydrate }}">
                    @error('carbohydrate')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
                <div class="formColumn">
                    <label for="protein" class="miniLabel">Protein</label><br>
                    <input class="miniInput" name="protein" type="tel" id="protein" value="{{ $product->productDetail->protein }}">
                    @error('protein')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
            </div>




            <label for="shelfLife">Shelf Life</label><br>
            <input class="inputNormal" name="shelfLife" type="tel" id="shelfLife" value="{{ $product->productDetail->shelfLife }}">
            @error('shelfLife')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            <div class="category">
                <p class="label">Category</p>
                <input type="radio" id="productCategory" name="productCategory" value="buah"
                    {{ $product->productDetail->productCategory == 'buah' ? 'checked' : '' }}>
                <label class="miniLabel" for="Buah">Buah</label><br>
                <input type="radio" id="productCategory" name="productCategory" value="sayur"
                    {{ $product->productDetail->productCategory == 'sayur' ? 'checked' : '' }}>
                <label class="miniLabel" for="sayur">Sayur</label>
                @error('productCategory')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
                <br>
            </div>


            <label for="productDesc">Product Desc</label><br>
            <textarea class="largeInput" name="productDesc"id="productDesc">{{$product->productDetail->productCategory}}</textarea>
            @error('productDesc')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="shelfLife">Product Image</label><br>
            <input name="image" type="file" id="image" placeholder="input image link here...">
            @error('image')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>


            <div class="buttonContainer">
                <a href="{{ route('admin.products') }}" class="cancelButton">Cancel</a>
                <button class="submitButton" type="submit">Save</button>
            </div>
        </form>
    </div>



@endsection
