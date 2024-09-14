@extends('layouts.app')

@push('head')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('title', 'Cart Page')

@section('content')
<div class="cart-container">
    @if ($count == 0)
        <div class="emptyCartMessage">
            <h1 class="h1">Shopping Cart</h1>
            <img src="{{ asset('image/cartKosong.jpg') }}" alt="" style="width: 20%">
            <h2>Well, your basket is empty</h2>
            <h2>Let's shop now</h2>
            <a href="{{ route('home') }}" class="btn btn-primary">Shop Now</a>
        </div>
    @else
        <form action="{{ route('checkout') }}" method="GET" id="checkout-form">
            <h1 class="h1">Shopping Cart</h1>
            <div class="deliveryTime">
                <h2 class="h2">Select Delivery Time</h2>
                <div class="deliveryOptions">
                    @foreach($deliveryTimes as $deliveryTime)
                        <div class="deliveryOption" data-delivery-time="{{ $deliveryTime['date'] }} {{ $deliveryTime['day'] }} {{ $deliveryTime['time'] }}">
                            <span class="date">{{ $deliveryTime['date'] }}</span><br>
                            <span class="day">{{ $deliveryTime['day'] }}</span><br>
                            <span class="time">{{ $deliveryTime['time'] }}</span>
                        </div>
                    @endforeach
                    <input type="hidden" name="selectedDeliveryTime" id="selectedDeliveryTime">
                </div>
                <div class="checkboxCheckAll">
                    <input type="checkbox" id="checkAll" class="checkAll">
                    <p>Select All</p>
                </div>
            </div>
            <div class="cart-content">
                <div class="cartItems" style="position: relative;">
                    @foreach ($cartItems as $cartItem)
                        @if ($cartItem->product->stock == 0)
                            <div class="cartItemKosong" data-price="{{ $cartItem->product->productPrice * $cartItem->quantity }}" style="background: #f1f1f1">
                                <p class="itemWeight rounded-pill" style="font-size: x-small;padding: 4px;background: #A3A3A3;">Out of Stock</p>
                                <div class="itemDetails">
                                    <p class="productDetailButton">
                                        <img src="{{ $cartItem->getImageURL() }}" class="card-img-top" alt="...">
                                    </p>
                                    <div>
                                        <p class="productDetailButton">
                                            <p class="itemName h5">{{$cartItem->product->productDetail->productName}}</p>
                                        </p>
                                        <p class="productDetailButton">
                                            <p class="itemWeight">{{$cartItem->product->variant}}</p>
                                        </p>
                                        <p class="productDetailButton">
                                            <p class="itemPrice">Rp. {{$cartItem->product->productPrice}}</p>
                                        </p>
                                    </div>
                                </div>
                                <div class="itemActions">
                                    <div class="quantityControl">
                                        <form action="" method="POST"
                                            class="d-inline plesMines">
                                            @csrf
                                            {{-- <button type="submit" class="btn btn-outline-secondary quantityBtn">-</button> --}}
                                        </form>
                                        {{-- yang atas ini dibiarin aja jangan dihapus, kalo dihapus jadi error --}}
                                        {{-- <p class="d-inline plesMines">
                                            <button type="button" class="btn btn-outline-success quantityBtn">-</button>
                                        </p>
                                        <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
                                        <p class="d-inline plesMines">
                                            <button type="button" class="btn btn-outline-success quantityBtn">+</button>
                                        </p> --}}
                                    </div>
                                    <form method="POST" action="{{ route('cart.destroy',$cartItem->product->productId) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="deleteButton"> Delete </button>
                                    </form>
                                </div>
                            </div>   
                        @else
                            <div class="cartItem" data-price="{{ $cartItem->product->productPrice * $cartItem->quantity }}">
                                <input type="checkbox" class="checkboxItem" name="selectedItems[]"
                                    value="{{ $cartItem->product->productId }}" @if(is_array(old('selectedItems')) &&
                                    in_array($cartItem->product->productId, old('selectedItems'))) checked @endif>
                                <div class="itemDetails">
                                    <a href="{{ route('productDetail', $cartItem->product->productId) }}" class="productDetailButton">
                                        <img src="{{ $cartItem->getImageURL() }}" class="card-img-top" alt="...">
                                    </a>
                                    <div>
                                        <a href="{{ route('productDetail', $cartItem->product->productId) }}" class="productDetailButton">
                                            <p class="itemName h5">{{$cartItem->product->productDetail->productName}}</p>
                                        </a>
                                        <a href="{{ route('productDetail', $cartItem->product->productId) }}" class="productDetailButton">
                                            <p class="itemWeight">{{$cartItem->product->variant}}</p>
                                        </a>
                                        <a href="{{ route('productDetail', $cartItem->product->productId) }}" class="productDetailButton">
                                            <p class="itemPrice">Rp. {{$cartItem->product->productPrice}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="itemActions">
                                    <div class="quantityControl">
                                        <form action="{{ route('cart.decrement', $cartItem->product->productId) }}" method="POST"
                                            class="d-inline plesMines">
                                            @csrf
                                            {{-- <button type="submit" class="btn btn-outline-secondary quantityBtn">-</button> --}}
                                        </form>
                                        {{-- yang atas ini dibiarin aja jangan dihapus, kalo dihapus jadi error --}}
                                        <form action="{{ route('cart.decrement', $cartItem->product->productId) }}" method="POST"
                                            class="d-inline plesMines">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success quantityBtn">-</button>
                                        </form>
                                        <span class="quantity mx-2">{{ $cartItem->quantity }}</span>
                                        <form action="{{ route('cart.increment', $cartItem->product->productId) }}" method="POST"
                                            class="d-inline plesMines">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success quantityBtn">+</button>
                                        </form>
                                    </div>
                                    <form method="POST" action="{{ route('cart.destroy',$cartItem->product->productId) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="deleteButton"> Delete </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                
                <div class="stickyFooter">
                    <div class="footerContent">
                        <div class="totalPaymentFinal">
                            <span>Total Payment</span>
                            <span id="totalPriceFooter">Rp 0</span>
                        </div>
                        <button type="submit" class="btn btn-success">Continue paying</button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection

@section('script')
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection
