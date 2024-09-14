@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/refund.css') }}">
@endpush

@section('title', 'Refund')

@section('content')
    @php
    $spendingSubtotal = 0;
    @endphp
    @foreach ($detail as $d)
    @php
        $itemTotal = $d->product->productPrice * $d->quantity;
        $spendingSubtotal += $itemTotal;
    @endphp
    @endforeach
    @php
    $packagingCosts = 1000;
    $totalPayment = $spendingSubtotal + $packagingCosts;
    @endphp

    <div class="container">
        <p class="title">Order Details</p>

        <div class="cart-content">
            <div class="cartItems">
                @foreach ($detail as $d)
                    <div class="cartItem">
                        <div class="itemDetails">
                            <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                <img src="{{ $d->product->getImageURL() }}" class="card-img-top" alt="...">
                            </a>
                            <div>
                                <a href="{{ route('productDetail', $d->product->productId) }}"
                                    class="productDetailButton">
                                    <p class="itemName h5">{{ $d->product->productDetail->productName }}</p>
                                </a>
                                <a href="{{ route('productDetail', $d->product->productId) }}"
                                    class="productDetailButton">
                                    <p class="itemWeight">{{ $d->product->variant }}</p>
                                </a>
                                <a href="{{ route('productDetail', $d->product->productId) }}"
                                    class="productDetailButton">
                                    <p class="itemWeight"> X {{ $d->quantity }} </p>
                                </a>
                            </div>
                        </div>
                        <div class="itemActions">
                            <p class="itemPrice"> Rp. {{ number_format($d->product->productPrice, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="stickyFooter">
                <div class="footerContent">

                    <div class="priceDetail">
                        <span>Packaging Costs</span>
                        <span id="packagingCosts" style="margin-right: 15px">Rp {{ number_format(1000, 0, ',', '.') }}</span>
                    </div>
                    <div class="priceDetail">
                        <span>Total Price</span>
                        <span id="totalPayment" style="color: red;font-size:1.3rem;margin-right: 15px">Rp
                            {{ number_format($totalPayment, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            <hr class="mt-3">
        </div>

        <p class="title">Request Refund</p>

        <form method="post" action="{{ route('order.storeRefund', $order->orderId) }}" enctype="multipart/form-data">
            @csrf
            <label for="reason">Reason For Refund</label>
            <textarea class="form-control mb-3" id="reason" rows="3" name="reason"></textarea>
            @error('reason')
                <span class="error text-danger">{{ $message }}</span> <br>
            @enderror

            <label for="image" class="form-label">Documentation</label>
            <input class="form-control mb-3" type="file" id="image" name="image">
            @error('image')
                <span class="error text-danger">{{ $message }}</span> <br>
            @enderror

            <button type="submit" class="submitButton">Submit Refund</button>
        </form>

    </div>

@endsection

@section('script')

@endsection
