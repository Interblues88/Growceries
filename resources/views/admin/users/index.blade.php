@extends('layouts.appAdmin')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/admin/product/adminCRUD.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}
    <link rel="stylesheet" href="{{ asset('css/admin/users/index.css') }}"> {{-- ini buat nyambungin home.css ke home blade nya --}}

    @endpush

@section('title', 'Admin | Users Page')

@section('content')
    <div class="container">
        <div class="searchContainer">
            <form method="GET" action="{{ route('admin.searchUsers') }}" style="width: 100%;text-align:center;">
                <p class="searchTitle">Find User Here ...</p>
                <input type="text" name="search" placeholder="Input User id here..." class="searchField"
                    id="searchField" value="{{ isset($search) ? $search : '' }}">
            </form>
            {{-- <p class="searchTitle">Find Our Product Here ...</p> --}}
            {{-- <form action="{{route('admin.searchProduct')}}" method="GET"> --}}
                {{-- <input type="text" placeholder="Input product code here..." class="searchField" id ="searchField" oninput=searchFunction($product)> --}}
            {{-- </form> --}}
        </div>
        <div class="productListContainer">
            <p class="productListTitle">User List</p>
            <?php
                $count = 0;
            ?>
            @foreach ($users as $user)
            @if ($user && $user->utype === "customer")

                    <?php
                        $count += 1;
                    ?>
                    <div class="productUnit">
                        <div class="unitTop">
                            <div class="topLeft">
                                <img src={{$user->image()}} alt="">
                            </div>
                            <div class="topMid">
                                <p class="productName">{{$user->name}}</p>
                                <p class="productStock">Id : {{$user->id}}</p>
                            </div>
                            <div class="topRight">
                                <a style="width: 100%;
                                height:7vh;
                                color: white;
                                background-color:red;
                                border:1px solid;
                                border-radius: 10px;
                                display:flex;
                                justify-content:center;
                                align-items:center" href="{{route('admin.banUsers', $user->id)}}">Ban</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($count == 0)
                <img class="noUserImage" src="{{asset('image/noUser.svg')}}" alt="">
                <p class="noUserExplain">There is no user here...</p>
            @endif
        </div>
    </div>

@endsection
