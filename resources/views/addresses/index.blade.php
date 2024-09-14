@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/addresses/index.css') }}">
@endpush

@section('content')
    <div class="container">
        <p class="h1">Your Addresses</p>
        <a href="{{ route('address.create') }}" class="btn btn-primary">Add New Address</a>
        <ul>
            @if ($addresses != null)
                @foreach ($addresses as $address)
                    <li>
                        <p>{{ $address->receiverName }}, {{ $address->phoneNumber }}</p>
                        <p>{{ $address->addressName }}, {{ $address->addressDetail }}</p>
                        <a href="{{ route('address.edit', $address) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('address.destroy', $address) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection
