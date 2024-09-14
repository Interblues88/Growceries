@extends('layouts.appCourier')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/courier/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/discover.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> ini buat nyambungin home.css ke home blade nya --}}
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/courier/home2.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

@endpush

@section('title', 'Courier Home')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <div class="content">
        <img src="{{ asset('image/GrowceriesLogo.svg') }}" class="logoGrow" alt="" srcset="">
        <div class="header">
            <div class="title">Order List</div>
            <form action="{{route('courier.find')}}" method="GET" id="search" data-aos="fade-right" data-aos-delay="200"
            data-aos-duration="1000" value="{{ isset($search) ? $search : '' }}>

                    <div class="input-group">
                    <div class="search_container">
                        <i class="bi bi-search" id="magnifying" style="color: #050505 solid"></i>
                        <input name="search_Input" type="text" autocomplete="off" placeholder="Search your daily Growceries"
                        id="myInput" oninput="filterFunction()" class="form-control">
                        <button class="search_button">Search</button>
                    </div>
                    </div>
                    <div class="result_box">
                    <div id="dropdown_m0" class="dropdown m-0">
                        <div id="myDropdown" class="dropdown-content">
                        <div class="result_field">
                            {{-- @foreach ($products as $product)
                            <div name="search_Input" class="percontent">
                            <a href="">
                                <div id="result_field" class="media flex-wrap w-100 align-items-centerr">
                                <i class="bi bi-search" id="magnifying2" style="color: #050505 solid"></i>
                                <p class="ml-23" style="color: #050505">{{ $product->productDetail->productName }}</p>
                                </div>
                            </a>
                            </div>
                            @endforeach --}}
                        </div>
                        </div>
                    </div>
                    </div>

            </form>
        </div>

    </div>
        <div class="option">
            <div onclick="hideShow(1)" id="pick"  class="option_sub">
                <p    class="option_title">Pick Up Order</p>
            </div>
            <div onclick="hideShow(2)" id="ship" class="option_sub">
                <p  class="option_title">Shipped Order</p>
            </div>
            {{-- <div id="done" class="option_sub">
                <p class="option_title">Order History</p>
            </div> --}}
        </div>
        {{-- @php
            dump($uporder->orderId)
        @endphp --}}
        <?php
        $totalPrice = 0;
        ?>
        <div id="list_pack" class="listfield">

                @foreach ($orders as $order)

                    @if ($order->orderStatus != "Packing")
                        @continue
                    @endif
                    <?php
                        $totalPrice = 0;

                    ?>
                    @foreach ($order->orderList as $orderr)
                        @if ($orderr->orderId == $order->orderId)
                            <?php
                                $totalPrice += $orderr->product->productPrice * $orderr->quantity;
                            ?>
                        @endif
                    @endforeach

                        <form action="{{ route('courier.update', $order->orderId) }}" method="GET" id="search2" data-aos="fade-right"
                            data-aos-delay="200" data-aos-duration="1000">
                                <div class="OrderUnit">
                                    <div class="unitTop">
                                        <div class="topLeft">
                                            <img src="{{ asset('image/shipped.svg') }}" alt="">
                                        </div>
                                        <div class="topMid">
                                            <p class="status">Order {{$order->orderId}} is being Packing</p>
                                            <p class="purchaseDate">Purchased at {{ $order->orderDate }}</p>
                                            <p class="productPurchased mb-1">Item Bought : {{ $order->orderList->count() }}
                                            </p>
                                        </div>
                                        <div class="topRight">
                                            <p class="totalPrice">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="unitBottom">
                                        <button id="update_status_button" class="button1" type="submit">Order Pick Up</button>
                                    </div>
                                </div>
                        </form>
            @endforeach
            @if ($totalPrice == 0)
                <img src="{{ asset('image/noOrder.png') }}" alt="">
                <p>There is no order to pick up</p>
            @endif
        </div>
        <div id="list_ship" class="listfield">
            @foreach ($orders as $order)
                @if ($order->orderStatus != "Shipped")
                    @continue
                @endif
                <?php
                    $totalPrice = 0;

                ?>
                @foreach ($order->orderList as $orderr)
                    @if ($orderr->orderId == $order->orderId)
                        <?php
                            $totalPrice += $orderr->product->productPrice * $orderr->quantity;
                        ?>
                    @endif
                @endforeach
                    <form action="{{ route('courier.update', $order->orderId) }}" method="GET" id="search2" data-aos="fade-right"
                        data-aos-delay="200" data-aos-duration="1000">
                            <div class="OrderUnit">
                                <div class="unitTop">
                                    <div class="topLeft">
                                        <img src="{{ asset('image/shipped.svg') }}" alt="">
                                    </div>
                                    <div class="topMid">
                                        <p class="status">Order {{$order->orderId}} is being Shipped</p>
                                        <p class="purchaseDate">Purchased at {{ $order->orderDate }}</p>
                                        <p class="productPurchased mb-1">Item Bought : {{ $order->orderList->count() }}
                                        </p>
                                    </div>
                                    <div class="topRight">
                                        <p class="totalPrice">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="unitBottom">
                                    <button id="update_status_button" class="button1" type="submit">Order Done</button>
                                </div>
                            </div>
                    </form>

            @endforeach
            @if ($totalPrice == 0)
                <img src="{{ asset('image/noOrder.png') }}" alt="">
                <p>There is No order to ship</p>
            @endif
        </div>
    {{-- </div> --}}
<script src="{{ asset('js/admin/courier/home.js') }}"></script>
{{-- href="{{ asset('js/admin/courier/home.js') }}" --}}
    {{-- <p class="h1">Welcome Courier</p>
    <p>Home page</p> --}}
@endsection
