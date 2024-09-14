@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{asset('css/addresses/chooseAddress.css')}}">
@endpush

@section('content')
<div class="container">
    <h1 class="title">~Choose Address~</h1>

    <div class="addressList">
        @foreach ($addresses as $address)
            <div class="addressUnit">
                <div class="left">
                    <p class="address">{{ $address->receiverName }} </p>
                    <p class="addressDetail">{{ $address->phoneNumber }}</p>
                    <p class="addressDetail">{{ $address->addressName }}, {{ $address->addressDetail }}</p>
                    
                </div>
                <div class="right">
                    <form method="GET" action="{{ route('checkout') }}">
                        @foreach (request()->input('selectedItems', []) as $item)
                            <input type="hidden" name="selectedItems[]" value="{{ $item }}">
                        @endforeach
                        <input type="hidden" name="selectedDeliveryTime" value="{{ request()->input('selectedDeliveryTime') }}">
                        <input type="hidden" name="addressId" value="{{ $address->addressId }}">
                        <button type="submit" class="submitButton">Use this address</button>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="addAddress">
            <a href="{{route('address.create')}}" class="addAddressButton">+ Add New Address</a>
        </div>
    </div>
</div>
@endsection
