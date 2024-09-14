@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
@endpush

@section('title', 'Admin Home')

@section('content')
    <div class="successMessage">
      @include('widgets.successMessage')
    </div>
    <div class="errorMessage">
        @include('widgets.errorMessage')
    </div>
    <div class="container">
        <p class="welcomeTitle">Welcome Admin</p>
        <div class="featureContainer">
            <div class="featureListColumn">
                <div class="featureListRow">
                    <div class="featureListUnit">
                        <img class="featureImage" src={{ asset('image/productAdmin.png') }} alt="">
                        <p class="featureTitle">Our Product</p>
                        <a class="featureButton" href="{{ route('admin.products') }}">
                            <button>View</button>
                        </a>
                    </div>
                    <div class="featureListUnit">
                        <img class="featureImage" src={{ asset('image/orderAdmin.png') }} alt="">
                        <p class="featureTitle">Order</p>
                        <a class="featureButton" href="{{ route('admin.orderAdmin') }}">
                            <button>View</button>
                        </a>
                    </div>
                </div>
                <div class="featureListRow">
                    <div class="featureListUnit">
                        <img class="featureImage" src={{ asset('image/userAdmin.png') }} alt="">
                        <p class="featureTitle">User</p>
                        <a class="featureButton" href="{{ route('admin.users') }}">
                            <button>View</button>
                        </a>
                    </div>
                    <div class="featureListUnit">
                        <img class="featureImage" src={{ asset('image/profileAdmin.png') }} alt="">
                        <p class="featureTitle">Profile</p>
                        <a class="featureButton" href="{{ route('admin.profileAdmin') }}">
                            <button>View</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
