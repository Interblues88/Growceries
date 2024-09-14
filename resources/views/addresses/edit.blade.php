@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/addresses/editAddress.css') }}">
@endpush

@section('content')
    <div class="container">
        <h1 class="title">Edit Address</h1>
        <form action="{{ route('address.update', $address->addressId) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="receiverName" class="form-label">Receiver Name</label>
                <input type="text" class="formAnswer" id="receiverName" name="receiverName"
                    value="{{ $address->receiverName }}">
                @error('receiverName')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="formAnswer" id="phoneNumber" name="phoneNumber"
                    value="{{ $address->phoneNumber }}">
                @error('phoneNumber')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="addressName" class="form-label">Address Name</label>
                <input type="text" class="formAnswer" id="addressName" name="addressName"
                    value="{{ $address->addressName }}">
                @error('addressName')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="addressDetail" class="form-label">Addres Detail</label>
                <input type="text" class="formAnswer" id="addressDetail" name="addressDetail"
                    value="{{ $address->addressDetail }}">
                @error('addressDetail')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="hidden" name="previous_page" value="{{ url()->previous() }}">
            <div class="button">
                <button type="submit" class="submitButton">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
