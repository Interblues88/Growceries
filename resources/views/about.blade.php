@extends('layouts.app')


@push('head')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">

@endpush

@section('title', 'Contact Us')

@section('content')

<div class="banner-faq">
    <div class="banner">
        <img src="image/banner.png" alt="" class="full-img">
        <div class="text1">
            <h1>About Us</h1>
        </div>
    </div>
</div>
<div class="description">
    <h1>What Is Growceries?</h1>
    <img src="image/logoGrowceries.png" alt="" class="logoimg">
    <p>"Growceries" is an innovative application specifically designed to facilitate the process of selling vegetables and fruit online. 
        With existing features, Growceries allows consumers to buy fresh products directly from the source. With a user-friendly interface 
        and secure payment system, Growceries is an ideal solution for those who value quality and sustainability in meeting their vegetable and fruit needs.</p>
</div>
<div class="contact">
    <div class="desc">
        <h1>Why Choose Us?</h1>
        <p>Because we offer a comfortable shopping experience, quality product collection, friendly customer service, and our commitment to your satisfaction.</p>
        <button id="contact-btn" onclick="location.href='{{ route('contactUs') }}'">Contact Us</button>
    </div>
    <div class="img">
        <img src="image/basket-with-vegetables-png-clipart-image-5a1c5cb10dbcb8 1.png" alt="" class="img">
    </div>
</div>
<div class="contact">
    <div class="img">
        <img src="image/image 8.png" alt="" class="img">
    </div>
    <div class="desc-store">
        <h1>What We Provide?</h1>
        <p>In GrowCeries, we provide a wide variety of fresh fruits and vegetables you need to stock your kitchen and home.</p>
        <button id="store-btn" onclick="location.href='{{ route('discover') }}'">Store</button>
    </div>
</div>



@endsection

@section('script')
    <script src="{{ asset('js/about.js') }}"></script>
@endsection
