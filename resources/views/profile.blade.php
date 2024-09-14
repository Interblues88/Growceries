@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('title', 'Profile Page')

@section('content')
    <div class="banner-prof">
        <div class="picture-container">
            <img src="{{ $user->image() }}" alt="PROFILE PICTURE" class="full-img">
            <img class="editClick cursor" id="editPict" src="../image/editIcon.png" alt="" onclick="openModal()">
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="top" id="top">
                    <p class="head2">Profile Picture</p>
                    <span class="close cursor" onclick="closeModal()"
                        style="font-family: Arial, Helvetica, sans-serif">x</span>
                </div>
                <input name="image" type="file" class="form-controlx">
                @error('image')
                    <p style="color: red; font-size: 1vw">Please choose your new profile picture!</p>
                @enderror
                <button type="submit" class="btn btn-secondary" style="background-color: green">Change Profile
                    Picture</button>
            </form>
        </div>
    </div>
    <br>
    <div class="personalData">
        @if ($editingPersonalData ?? false)
            <form action="{{ route('profile.updatePersonalData') }}" method="POST">
                @csrf
                <div class="top">
                    <p class="head2">Personal Data</p>
                    <a class="editClick" href="{{ route('profile') }}"><img src="../image/cancelEditIcon.png"
                            alt=""></a>
                </div>

                <p class="head3E">Name</p>
                <input class="dataE" name="name" value="{{ $user->name }}" type="text">
                @error('name')
                    <p style="color: red; font-size: 1vw">Please input your name!</p>
                @enderror

                <p class="head3E">Gender</p>
                <select class ="dataE" name="gender" id="gender">
                    @if ($user->gender)
                        <option value="{{ $user->gender }}" disabled selected hidden>{{ $user->gender }}</option>
                    @else
                        <option value="" disabled selected hidden>Not set yet</option>
                    @endif
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <p class="head3E">Phone Number</p>
                <input class="dataE" name="phone" value="{{ $user->phoneNumber }}"type="text">
                @error('phone')
                    <p style="color: red; font-size: 1vw">Please input your phone number!</p>
                @enderror

                <p class="head3E">E-mail</p>
                <input class="dataE" name="email" value="{{ $user->email }}"type="text">
                @error('email')
                    <p style="color: red; font-size: 1vw">Please input your e-mail!</p>
                @enderror

                <button type="submit" class="btn btn-secondary" style="background-color: green">Save Changes</button>
            </form>
        @else
            <div class="top">
                <p class="head2">Personal Data</p>
                <a class="editClick" href="{{ route('profile.editPersonalData') }}"><img src="../image/editIcon.png"
                        alt=""></a>
            </div>

            <p class="head3">Name</p>
            <span class="data">
                <p>{{ $user->name }}</p>
            </span>

            <p class="head3">Gender</p>
            @if ($user->gender)
                <span class="data">{{ $user->gender }}</span>
            @else
                <span class="data">not set yet</span>
            @endif

            <p class="head3">Phone Number</p>
            <span class="data">{{ $user->phoneNumber }}</span>

            <p class="head3">E-mail</p>
            <span class="data">{{ $user->email }}</span>
        @endif
    </div>
    <br>
    <div class="address">
        <div class="top">
            <p class="head2">Address</p>
            <a class="editClick" href="{{ route('address.index') }}"><img src="../image/editIcon.png" alt=""></a>
        </div>
        <p class="head3">Main Address</p>
        <span class="data" id="address">
            @if (!$user->addresses->first())
                Not set yet
            @else
                {{ $user->addresses->first()->addressName }},
                {{ $user->addresses->first()->addressDetail }}
        </span>
        @endif
    </div>
    <br>
@endsection

@section('script')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
