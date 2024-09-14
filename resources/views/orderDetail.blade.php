@extends('layouts.app')

@section('title', 'Order Detail')

@push('head')
    <link rel="stylesheet" href="{{ asset('css\orderDetail.css') }}">
@endpush

@section('content')
    <h1 class="title">Your Order Status</h1>
    <p class="orderId">Order Id : {{ $order->orderId }}</p>
    @if ($order->orderStatus == 'Packing')
        <div class="packing">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Paid at :</p>
                    <p class="explanation"> {{$order->created_at}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Packing Your Order</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="iconUnit">
                <div class="icon">
                    <img src="{{asset('image/shipped.svg')}}" alt="">
                </div>
            </div>
            <hr class="horizontalLine">
            <div class="iconUnit">
                <div class="icon">
                    <img src="{{asset('image/completedBW.svg')}}" alt="">
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Shipped')
        <div class="packing">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Paid at :</p>
                    <p class="explanation"> {{$order->created_at}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p class="statusTitle">Packing Your Order</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Shipped</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/completedBW.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Done')
        <div class="packing">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Paid at :</p>
                    <p class="explanation"> {{$order->created_at}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p class="statusTitle">Packing Your Order</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Shipped</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completed.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order is Arrived</p>
                    <p class="explanation"> {{$order->droppeddatetime}}</p>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Request Refund')
        <div class="packing">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Paid at :</p>
                    <p class="explanation"> {{$order->created_at}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p class="statusTitle">Packing Your Order</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Shipped</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completed.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order is Arrived</p>
                    <p class="explanation"> {{$order->droppeddatetime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/requestRefund.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Refund in Progress</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnit">
                    <div class="icon">
                        <img src="{{asset('image/completed.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @elseif($order->orderStatus == 'Refunded' || $order->orderStatus == 'Rejected')
        <div class="packing">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/wallet.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Paid at :</p>
                    <p class="explanation"> {{$order->created_at}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/packing.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p class="statusTitle">Packing Your Order</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/shipped.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order Shipped</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/completed.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Order is Arrived</p>
                    <p class="explanation"> {{$order->droppeddatetime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                <div class="iconUnitComplete">
                    <div class="iconComplete">
                        <img src="{{asset('image/requestRefund.svg')}}" alt="">
                    </div>
                </div>
                <div class="explainUnit">
                    <p>Refund in Progress</p>
                    <p class="explanation"> {{$order->deliveryTime}}</p>
                </div>
            </div>
            <hr class="horizontalLineComplete">
            <div class="fullUnit">
                @if ($order->orderStatus == 'Refunded')
                    <div class="iconUnitComplete">
                        <div class="iconComplete">
                            <img src="{{asset('image/refunded.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="explainUnit">
                        <p>Refunded</p>
                    </div>
                @elseif ($order->orderStatus == 'Rejected')
                    <div class="iconUnitComplete">
                        <div class="iconComplete">
                            <img src="{{asset('image/rejected.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="explainUnit">
                        <p>Request Rejected</p>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <hr class="sectionLine">
    <h1 class="title">Order List</h1>
    <div class="orderList">
        @foreach ($orderDetail as $detail)
            <div class="unit">
                <div class="left">
                    <img src="{{ $detail->product->getImageURL() }}" alt="" class="productImage">
                </div>
                <div class="mid">
                    <p class="productName">{{ $detail->product->productName }}</p>
                    <p class="amount">X {{ $detail->quantity }}</p>
                </div>
                <div class="right">
                    <p class="productPrice">Rp. {{ $detail->product->productPrice }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <hr class="sectionLine">
    <div class="paymentDetail">
        <div class="paymentDetailLeft">
            <p class="title">Address Details</p>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Receiver Name</p>
                <p class="paymentDetailAns"> : {{ $order->address->receiverName }}</p>
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Phone Number</p>    
                <p class="paymentDetailAns"> : {{ $order->address->phoneNumber }}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Location Details</p>
                <p class="paymentDetailAns"> : {{ $order->address->addressDetail }}</p>   
            </div>
        </div>
        <div class="paymentDetailRight">
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Spending Subtotal</p>    
                <p class="paymentDetailRightAns">Rp. {{ $totalPrice }}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Shipping Cost</p>
                <p class="paymentDetailAnsFree">Free</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Service Fees</p>
                <p class="paymentDetailAnsFree">Free</p>
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Packaging Cost</p>    
                <p class="paymentDetailRightAns">Rp. 1.000</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Total Payment</p>
                <p class="paymentDetailAnsPrice">Rp. {{{ $totalPrice +1000}}}</p>   
            </div>
            <div class="paymentDetailUnit">
                <p style="font-size: 20px" class="paymentDetailTitle">Payment Method</p>
                <p class="paymentDetailRightAns">{{$order->payment}}</p>   
            </div>
        </div>
    </div>
    <hr class="sectionLine">
@endsection
