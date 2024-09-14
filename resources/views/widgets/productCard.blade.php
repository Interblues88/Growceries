@push('head')
<link rel="stylesheet" href="{{ asset('css/widgets/productCard.css') }}">
@endpush


@if ($product->stock != 0)
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 d-flex align-items-stretch mt-3">
    <div class="card">
      <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
        <img src="{{ $product->getImageURL() }}" class="card-img-top" alt="Product Image"
          style="height: 300px;width: 257px;">

      </a>
      <div class="card-body">
        <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
          <p class="card-title h5">{{$product->productDetail->productName}}</p>
        </a>
        <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
          <p class="text-muted card-text varianttext">{{$product->variant}}gr</p>
        </a>
        <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
          <p class="card-text productPrice">Rp {{$product->productPrice}}</p>
        </a>
        @php
        $cartItem = $cartItems->firstWhere('productId', $product->productId);
        @endphp

        @if (is_null($cartItem) || $cartItem->quantity == 0)
        <!-- ADD Button -->
        <a href="{{ url('add-cart', $product->productId) }}" type="button" class="btn addbutton">ADD</a>
        @else
        <!-- Increment and Decrement Buttons -->
        <div class="quantityControl">
          <form action="{{ route('cart.decrement', $product->productId) }}" method="POST" class="d-inline plesMines">
            @csrf
            <button type="submit" class="btn btn-outline-secondary quantity-btn">-</button>
          </form>
          <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
          <form action="{{ route('cart.increment', $product->productId) }}" method="POST" class="d-inline plesMines">
            @csrf
            <button type="submit" class="btn btn-outline-success quantity-btn">+</button>
          </form>
        </div>
        @endif
        {{-- <a href="{{ url('add-cart', $product->productId) }}" type="button" class="btn addbutton">ADD</a> --}}
      </div>
    </div>
  </div>

@else
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6 d-flex align-items-stretch mt-3">
    <div class="card" style="background-color: #f1f1f1">
      <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
        <img src="{{ $product->getImageURL() }}" class="card-img-top" alt="Product Image"
          style="height: 300px;width: 257px;">

      </a>
      <div class="card-body">
        <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
          <p class="card-title h5">{{$product->productDetail->productName}}</p>
        </a>
        <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}" class="productDetailButton">
          <p class="text-muted card-text varianttext">{{$product->variant}}gr</p>
        </a>
        <a href="{{ route('productDetail', ['id'=>$product->productId]) }}" class="productDetailButton">
          <p class="card-text productPrice">Rp {{$product->productPrice}}</p>
        </a>
        @php
        $cartItem = $cartItems->firstWhere('productId', $product->productId);
        @endphp
        <p class="itemWeight rounded-pill" style="font-size: x-small;padding: 4px;background: #A3A3A3;text-align: center;margin-top: 2rem;font-size: large">Out of Stock</p>

      </div>
    </div>
  </div>
@endif