@push('head')
<link rel="stylesheet" href="{{ asset('css/widgets/searchBar.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
@endpush

<form action="{{route('discover')}}" method="GET" id="search" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
        <div class="input-group">
            <div class="search_container">
            
                <i class="bi bi-search" id="magnifying" style="color: #050505 solid"></i>
                <input name="search_Input" type="text" autocomplete="off" placeholder="Search your daily Growceries" id="myInput" oninput="filterFunction()"
                class="form-control">
                <button class="searchButton">Search</button>
            </div>
            <button class="buttonFilter" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                <i class="bi bi-funnel-fill"></i>
            </button>
        </div>
        <div class="result_box">
            <div id="dropdown_m0" class="dropdown m-0">
                <div id="myDropdown" class="dropdown-content">
                    <div class="result_field">
                        @foreach ($products_all as $product)
                        <a href="{{ route('productDetail', ['id'=>$product->productDetailId]) }}">
                            <div name="search_Input" class="percontent">
                                <div id="result_field" class="media flex-wrap w-100 align-items-centerr">
                                    <i class="bi bi-search" id="magnifying2" style="color: #050505 solid"></i>
                                    <p class="ml-23" style="color: #050505">{{ $product->productDetail->productName }} {{$product->variant}}gr</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</form>

{{-- <script src="{{ asset('js/search.js') }}"></script> --}}
