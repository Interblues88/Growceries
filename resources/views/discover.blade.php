@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/discover.css') }}">
@endpush

@section('title', 'Discover')

@section('content')
<p class="h1centerText">These are the items you may need...</p>
@include('widgets.searchBar')
<div class="result_box">
    {{-- <ul>
        <li>
                <i class="fa fa-search"></i>
                test
            </li>
            <li>
                <i class="fa fa-search"></i>
                test2
            </li>
        </ul> --}}


</div>

<form class = "filter" method="GET" action="{{ route('discover') }}">
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
       <h1><b>Filter</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body"
        <form action="{{route('discover')}}" method="GET" id="search" data-aos="fade-right" data-aos-delay="200"
        data-aos-duration="1000">
            <div class="main">
                <div class="filterbox">
                    <h2>Category</h2>
                    <div class="categorylist">
                        <label name='sayur' class="category_label"  for="category-sayur">
                            <input type="checkbox" name="sayur" id="category-sayur">Vegetable
                        </label>
                        <label name='buah' class="category_label" for="category-buah">
                            <input type="checkbox" name="buah" id="category-buah">Fruit
                        </label>
                    </div>
                </div>
                <div class="header">
                    <h2>Price Range</h2>
                </div>
                <div class="wrapper">
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="125000">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" value="375000">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="500000" value="125000" step="500">
                        <input type="range" class="range-max" min="0" max="500000" value="375000" step="500">
                    </div>
                </div>
                <button type="button" id="save-filters">Save</button>
        </div>
        </form>
    </div>
</div>
</form>

    <div class="recommendedSection">
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 mx-3">
          @foreach ($products as $product)
            @include('widgets.productCard')
          @endforeach
        </div>
      </div>
@endsection

@section('script')
    <script src="{{ asset('js/discover.js') }}"></script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
