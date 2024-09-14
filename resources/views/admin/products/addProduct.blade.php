@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/addProduct.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Admin | Add Products Page')

@section('content')
    <p class="addProductTitle">Add Product</p>
    <div class="addProductContainer">
        <form action="{{ route('admin.addProduct') }}" method="POST">
            @csrf
            <label for="productName" class="label">Product Name</label><br>
            <input class="inputNormal" name="productName" type="text" id="productName" placeholder="input product name here...">
            @error('productName')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="productPrice">Product Price</label><br>
            <input class="inputNormal" name="productPrice" type="tel" id="productPrice" placeholder="input product price here...">
            @error('productPrice')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="stock">Stock</label><br>
            <input class="inputNormal" name="stock" type="tel" id="stock" placeholder="input product stock here...">
            @error('stock')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="variant">Variant</label><br>
            <input class="inputNormal" name="variant" type="text" id="variant" placeholder="input product variant here...">
            @error('variant')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="origin">Product Origin</label><br>
            <input class="inputNormal" name="origin" type="tel" id="origin" placeholder="input product origin here...">
            @error('origin')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            <p class="label">Nutrition Details</p>
            <div class="formRow">
                <div class="formColumn">
                    <label for="calories" class="miniLabel">Calories</label><br>
                    <input class="miniInput" name="calories" type="tel" id="calories" placeholder="input calories here...">
                    @error('calories')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    
                    <label for="fat" class="miniLabel">Fat</label><br>
                    <input class="miniInput" name="fat" type="tel" id="fat" placeholder="input fat here...">
                    @error('fat')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
                <div class="formColumn">
                    <label for="sugar" class="miniLabel">Sugar</label><br>
                    <input class="miniInput" name="sugar" type="tel" id="sugar" placeholder="input sugar here...">
                    @error('sugar')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
        
                    <label for="carbohydrate" class="miniLabel">Carbohydrate</label><br>
                    <input class="miniInput" name="carbohydrate" type="tel" id="carbohydrate" placeholder="input carbohydrate here...">
                    @error('carbohydrate')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
                <div class="formColumn">
                    <label for="protein" class="miniLabel">Protein</label><br>
                    <input class="miniInput" name="protein" type="tel" id="protein" placeholder="input protein here...">
                    @error('protein')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                </div>
            </div>
            
            <label for="shelfLife">Shelf Life</label><br>
            <input class="inputNormal" name="shelfLife" type="tel" id="shelfLife" placeholder="input shelf life here...">
            @error('shelfLife')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>
            <div class="category">
                <p class="label">Category</p>
                <input type="radio" id="productCategory" name="productCategory" value="buah" {{ old('productCategory') == "buah" ? 'checked' : '' }}>
                <label class="miniLabel" for="Buah">Fruit</label><br>
                <input type="radio" id="productCategory" name="productCategory" value="sayur" {{ old('productCategory') == "sayur" ? 'checked' : '' }}>
                <label class="miniLabel" for="sayur">Vegetable</label>
                @error('productCategory')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
                <br>
            </div>
            
                        
            <label for="productDesc">Product Desc</label><br>
            <textarea class="largeInput" name="productDesc"id="productDesc" placeholder="input description here..."></textarea>
            @error('productDesc')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <label for="shelfLife">Product Image</label><br>
            <input name="image" type="file" id="image">
            @error('image')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <br>

            <div class="buttonContainer">
                <a href="{{ route('admin.products') }}" class="cancelButton">Cancel</a>
                <button type="submit" class="submitButton">Save</button>
            </div>
        </form>
    </div>



@endsection