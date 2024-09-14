@extends('layouts.appAdmin')

@push('head')
<link rel="stylesheet" href="{{ asset('css/admin/order/detail.css') }}">
@endpush

@section('title', 'Order Detail')

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

<div class="cart-container">
    <div class="productListContainer">
        <p class="productListTitle">Order Details</p>
        <p style="width:100%;text-align:right">Order Number : {{ $order->orderId }} </p>
    </div>

    <div class="timeline">
        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
                <img src="{{ asset('image/ordered.svg') }}" alt="Icon 1" width="80%">
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Order Made</p>
                <p class="timeline-date">{{ $order->created_at }} </p>
                <br>
            </div>
        </div>

        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Packing', 'Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
                <img src="{{ asset('image/wallet.svg') }}" alt="Icon 2" width="80%">
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Packing Your Order</p>
                <p class="timeline-date">{{ $order->created_at }}</p>
                <br>
            </div>
        </div>

        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Shipped', 'Done', 'Request Refund', 'Rejected', 'Refunded'])) completed @else pending @endif">
                @if (in_array($order->orderStatus, ['Done', 'Shipped']))
                <img src="{{ asset('image/shipped.svg') }}" alt="Icon 4" width="80%">
                @else
                <img src="{{ asset('image/shippedBW.svg') }}" alt="Icon 4" width="80%">
                @endif
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Order Shipped</p>
                <p class="timeline-date">{{ $order->deliveryTime }}</p>
                <br>
            </div>
        </div>

        @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected']))
        @if ($order->orderStatus == 'Refunded')
        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
                <img src="{{ asset('image/requestRefund.svg') }}" alt="" width="80%">
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Requested Refund</p>
                <p class="timeline-date">{{ $order->deliveryTime }}</p>
                <br>
            </div>
        </div>
        <div class="timeline-step @if (in_array($order->orderStatus, ['Refunded'])) completed @else pending @endif">
            <div class="timeline-icon @if (in_array($order->orderStatus, ['Refunded'])) completed @else pending @endif">
                @if (in_array($order->orderStatus, ['Done', 'Shipped']))
                <img src="{{ asset('image/refunded.svg') }}" alt="Icon 4" width="80%">
                @else
                <img src="{{ asset('image/refundedBW.svg') }}" alt="Icon 4" width="80%">
                @endif
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Refunded</p>
                <p class="timeline-date">{{ $order->deliveryTime }}</p>
                <br>
            </div>
        </div>
        @elseif ($order->orderStatus == 'Rejected')
        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
                <img src="{{ asset('image/requestRefund.svg') }}" alt="" width="80%">
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Requested Refund</p>
                <p class="timeline-date">{{ $order->deliveryTime }}</p>
                <br>
            </div>
        </div>
        <div class="timeline-step @if (in_array($order->orderStatus, ['Rejected'])) completed @else pending @endif">
            <div class="timeline-icon @if (in_array($order->orderStatus, ['Rejected'])) completed @else pending @endif">
                @if (in_array($order->orderStatus, ['Done', 'Shipped', 'Rejected']))
                <img src="{{ asset('image/rejected.svg') }}" alt="Icon 4" width="80%">
                @else
                <img src="{{ asset('image/rejectedBW.svg') }}" alt="Icon 4" width="80%">
                @endif
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Rejected</p>
                <p class="timeline-date">{{ $order->deliveryTime }}</p>
                <br>
            </div>
        </div>
        @elseif ($order->orderStatus == 'Request Refund')
        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Request Refund', 'Refunded', 'Rejected'])) completed @else pending @endif">
                <img src="{{ asset('image/requestRefund.svg') }}" alt="" width="80%">
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Requested Refund</p>
                <p class="timeline-date">{{ $order->refund->created_at }}</p>
                <br>
            </div>
        </div>
        <div
            class="timeline-step @if (in_array($order->orderStatus, ['Refunded', 'Rejected'])) completed @else pending @endif">
            <div
                class="timeline-icon @if (in_array($order->orderStatus, ['Refunded', 'Rejected'])) completed @else pending @endif">
                {{-- <img src="{{ asset('image/requestRefund.svg') }}" alt="" width="80%"> --}}
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Refunded or Rejected</p>
                <p class="timeline-date">{{ $order->refund->refundedtime }}</p>
                <br>
            </div>
        </div>
        @endif
        @else
        <div class="timeline-step @if ($order->orderStatus == 'Done') completed @else pending @endif">
            <div class="timeline-icon @if (in_array($order->orderStatus, ['Done'])) completed @else pending @endif">
                @if ($order->orderStatus == 'Done')
                <img src="{{ asset('image/completed.svg') }}" alt="Icon 4" width="80%">
                @else
                <img src="{{ asset('image/completedBW.svg') }}" alt="Icon 4" width="80%">
                @endif
            </div>
            <div class="timeline-content">
                <p class="timeline-title">Order Completed</p>
                <p class="timeline-date">{{ $order->droppeddatetime }}</p>
                <br>
            </div>
        </div>
        @endif

        <div
            class="timeline-line @if ($order->orderStatus == 'Done') Completed @elseif($order->orderStatus == 'Shipped')Shipping @elseif($order->orderStatus == 'Request Refund')requestRefund @elseif($order->orderStatus == 'Refunded')Refunded @elseif($order->orderStatus == 'Rejected')Rejected @else Packing @endif">
        </div>
    </div>

    <div id="checkout-form" class="mb-5">
        <div class="cart-content">
            <div class="cartItems">
                @foreach ($detail as $d)
                <div class="cartItem">
                    <div class="itemDetails">
                        <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                            <img src="{{ $d->product->getImageURL() }}" class="card-img-top" alt="...">
                        </a>
                        <div>
                            <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                <p class="itemName h5">{{ $d->product->productDetail->productName }}</p>
                            </a>
                            <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
                                <p class="itemWeight">{{ $d->product->variant }}</p>
                            </a>
                            <a href="{{ route('productDetail', $d->product->productId) }}" class="productDetailButton">
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
                <div class="alamat">
                    <p class="" style="font-size:2rem">Address</p>
                    <p class="" style="font-size:1.5rem">{{ $order->address->receiverName }}</p>
                    <p class="text-muted" style="font-size:1rem;color:gray">{{ $order->address->phoneNumber }}</p>
                    <p class="text-muted" style="font-size:1rem;color:gray">{{ $order->address->addressName }},
                        {{ $order->address->addressDetail }} </p>
                </div>
                <div class="footerContent">
                    <div class="priceDetail">
                        <span>Spending Subtotal</span>
                        <span id="spendingSubtotal">Rp {{ number_format($spendingSubtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="priceDetail">
                        <span>Shipping Costs</span>
                        <span id="shippingCosts" style="color: green">Free</span>
                    </div>
                    <div class="priceDetail">
                        <span>Service Fees</span>
                        <span id="serviceFee" style="color: green">Free</span>
                    </div>
                    <div class="priceDetail">
                        <span>Packaging Costs</span>
                        <span id="packagingCosts">Rp {{ number_format(1000, 0, ',', '.') }}</span>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <div class="priceDetail">
                        <span>Total Payment</span>
                        <span id="totalPayment" style="color: red;font-size:1.6rem">Rp
                            {{ number_format($totalPayment, 0, ',', '.') }}</span>
                    </div>
                    <div class="priceDetail">
                        <span>Payment Method</span>
                        <p id="mb-3"> {{ $order->paymentMethod }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($order->orderStatus == 'Request Refund')
    <hr style="margin-left: 50px;margin-right:50px">

    <p style="font-size: 2.5rem;text-align:center">Refund Summary</p>

    <div class="refund" style="display: flex;flex-direction:column">
        <div class="accReturn mt-3">
            <p style="font-size: 1.5rem">Refund Reason</p>
            <p style="font-size: 1rem;color:gray;width:50%">{{ $order->refund->content }}</p>
            <p style="font-size: 1.5rem">Documentation</p>
            <img src="{{ asset('image/' . $order->refund->image) }}" alt="Order Image" style="width:40%">
            <div class="buttonRefund mt-4 mb-4">
                <button style="background-color:#C20202;border-radius:30px;padding:10px;width:300px;color:white"
                    data-modal-target="default-modal1" data-modal-toggle="default-modal1" class=""
                    type="button">Reject</button>
                <button style="background-color:#3F945A;border-radius:30px;padding:10px;width:300px;color:white"
                    data-modal-target="default-modal" data-modal-toggle="default-modal" class=""
                    type="button">Accept</button>
            </div>
        </div>
    </div>


    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                    <h3 class="text-xl font-semibold text-black">
                        Alert
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-900">
                        Are you sure you want to give a refund?
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <div class="ml-auto flex gap-3">
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            Decline
                        </button>
                        <form action="{{ route('admin.accRefund', $order->orderId) }}" class="inline">
                            <button data-modal-hide="default-modal" type="submit"
                                class="text-white hover:bg-opacity-80 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                style="background-color: #3F945A">
                                Accept
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="default-modal1" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                    <h3 class="text-xl font-semibold text-black">
                        Alert
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="default-modal1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>   
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-900">
                        Are you sure you want to reject the refund?
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <div class="ml-auto flex gap-3">
                        <button data-modal-hide="default-modal1" type="button"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            Decline
                        </button>
                        <form action="{{ route('admin.rejRefund', $order->orderId) }}" class="inline">
                            <button data-modal-hide="default-modal1" type="submit"
                                class="text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                style="background-color: #3F945A">
                                Accept
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</div>

@endsection