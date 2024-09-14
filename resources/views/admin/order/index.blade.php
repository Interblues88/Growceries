@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/order/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/widgets/searchBar.css') }}">
@endpush

@section('title', 'Order')

@section('content')
    @php
        $done = 0;
        $packingshipped = 0;
        $refunded = 0;
        $requestRefund = 0;
        $rejected = 0;
        foreach ($orders as $o) {
            if ($o->orderStatus == 'Done') {
                $done += 1;
            } elseif ($o->orderStatus == 'Shipped' || $o->orderStatus == 'Packing') {
                $packingshipped += 1;
            } elseif ($o->orderStatus == 'Refunded') {
                $refunded += 1;
            } elseif ($o->orderStatus == 'Request Refund') {
                $requestRefund += 1;
            } elseif ($o->orderStatus == 'Rejected') {
                $rejected += 1;
            }
        }
    @endphp

    <div class="container">
        <div class="searchContainer">
            <form method="GET" action="{{ route('admin.searchOrder') }}" style="width: 100%;text-align:center;">
                <p class="searchTitle">Find Order Here ...</p>
                <input type="text" name="search" placeholder="Input order id here..." class="searchField"
                    id="searchField" value="{{ isset($search) ? $search : '' }}">
            </form>
        </div>

        <div class="productListContainer">
            <p class="productListTitle">Order List</p>
            <a href="{{ route('admin.orderAdmin') }}" class="topright">Show All</a>
            <div class="orderTypeButton tab">
                <button class="orderButton tablinks" onclick="openOrder(event, 'inProgress')">In Progress</button>
                <button class="orderButton tablinks" onclick="openOrder(event, 'done')">Done</button>
                <button class="orderButton tablinks" onclick="openOrder(event, 'requestRefund')">Request Refund</button>
            </div>

            <div id="inProgress" class="Order tabcontent">
                @if ($packingshipped != 0)
                    @foreach ($orders as $list)
                        @if (in_array($list->orderStatus, ['Packing', 'Shipped']))
                            <div class="OrderUnit">
                                <div class="unitTop">
                                    <div class="topLeft">
                                        <img src="{{ asset('image/' . strtolower($list->orderStatus) . '.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order Id : {{ $list->orderId }} </p>
                                        <p class="status">Order is being {{ $list->orderStatus }}</p>
                                        <p class="purchaseDate">Purchased at {{ $list->created_at }}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>
                                    </div>
                                    <div class="topRight">
                                        <p class="totalPrice">{{ $list->price }}</p>
                                    </div>
                                </div>
                                <div class="unitBottom">
                                    <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View Order
                                        Details</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <img src="{{ asset('image/noOrder.png') }}" alt="" width="20%">
                    <p>No Orders Yet...</p><br><br><br><br>
                @endif
            </div>

            <div id="done" class="Order tabcontent">
                @if ($done != 0)
                    @foreach ($orders as $list)
                        @if ($list->orderStatus == 'Done')
                            <div class="OrderUnit">
                                <div class="unitTop">
                                    <div class="topLeft">
                                        <img src="{{ asset('image/completed.svg') }}" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order Id : {{ $list->orderId }} </p>
                                        <p class="status">Order is Arrived</p>
                                        <p class="purchaseDate">Purchased at {{ $list->created_at }}</p>
                                        <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}</p>
                                    </div>
                                    <div class="topRight">
                                        <p class="totalPrice">{{ $list->price }}</p>
                                    </div>
                                </div>
                                <div class="unitBottom">
                                    <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View Order
                                        Details</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <img src="{{ asset('image/noOrder.png') }}" alt="" width="20%">
                    <p>No Orders Yet...</p><br><br><br><br>
                @endif
            </div>

            <div id="requestRefund" class="Order tabcontent">
                <!-- Request Refund Orders Section -->
                <button class="accordion">In Progress</button>
                <div class="panel mt-3"
                    style="display:none;justify-content: center;flex-direction: column;align-items: center;"> 
                    @if ($requestRefund != 0)
                        @foreach ($orders as $list)
                            @if ($list->orderStatus == 'Request Refund')
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{ asset('image/requestRefund.svg') }}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order Id : {{ $list->orderId }} </p>
                                            <p class="status">Refund Have Been Requested</p>
                                            <p class="purchaseDate">Purchased at {{ $list->created_at }}</p>
                                            <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}
                                            </p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{ $list->price }}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View
                                            Order
                                            Details</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <img src="{{ asset('image/noOrder.png') }}" alt="" width="20%">
                        <p>No Orders Yet...</p><br><br><br><br>
                    @endif
                </div>

                <!-- Refunded Orders Section -->
                <button class="accordion">Completed</button>
                <div class="panel mt-3"
                    style="display: none;justify-content: center;flex-direction: column;align-items: center;">
                    @if ($refunded != 0 || $rejected != 0)
                        @foreach ($orders as $list)
                            @if ($list->orderStatus == 'Refunded')
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{ asset('image/refunded.svg') }}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order Id : {{ $list->orderId }} </p>
                                            <p class="status">Refund Have Already Been Refunded</p>
                                            <p class="purchaseDate">Purchased at {{ $list->created_at }}</p>
                                            <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}
                                            </p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{ $list->price }}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View
                                            Order
                                            Details</a>
                                    </div>
                                </div>
                            @elseif ($list->orderStatus == 'Rejected')
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{ asset('image/rejected.svg') }}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order Id : {{ $list->orderId }} </p>
                                            <p class="status">Refund is Rejected</p>
                                            <p class="purchaseDate">Purchased at {{ $list->created_at }}</p>
                                            <p class="productPurchased mb-1">Item Buyed : {{ $list->orderList->count() }}
                                            </p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">{{ $list->price }}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <a href="{{ route('admin.orderDetail', $list->orderId) }}" class="button1">View
                                            Order
                                            Details</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <img src="{{ asset('image/noOrder.png') }}" alt="" width="20%">
                        <p>No Orders Yet...</p><br><br><br><br>
                    @endif
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script src="{{ asset('js/admin/order/detail.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var searchResult = {!! json_encode($searchResult ?? null) !!};

                if (searchResult) {
                    if (searchResult.orderStatus === 'Done') {
                        activateTab('done');
                    } else if (['Refunded', 'Request Refund'].includes(searchResult.orderStatus)) {
                        activateTab('requestRefund');
                    } else {
                        activateTab('inProgress');
                    }
                } else {
                    activateTab('inProgress');
                }
            });

            function activateTab(orderStatus) {
                var i, tabcontent, tablinks;

                // Hide all tab contents
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove active class from all tab links
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("active");
                }

                // Show the current tab and add an "active" class to the button that opened the tab
                document.getElementById(orderStatus).style.display = "inline-flex";
                var tabButton = document.querySelector(`button[onclick="openOrder(event, '${orderStatus}')"]`);
                if (tabButton) {
                    tabButton.classList.add("active");
                }
            }

            function openOrder(evt, orderStatus) {
                activateTab(orderStatus);
                evt.currentTarget.classList.add("active");
            }
        </script>
    @endsection
