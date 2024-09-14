@extends('layouts.app')

@push('head')
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/layout/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/layout/main.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">

@endpush

@section('title', 'Register')

@section('register')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-30 p-b-54">
            <form class="login100-form validate-form" action="{{ route('register') }}" method="POST">
                @csrf
                <span class="login100-form-title p-b-30">
                    Register
                </span>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Name</span>
                    <input class="input100" type="text" name="name" placeholder="Type your name" value="{{old('name')}}">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                @error('name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="wrap-input100 validate-input m-t-23">
                    <span class="label-input100">Handphone Number</span>
                    <input class="input100" type="tel" name="phonenumber" placeholder="Type your handphone number" value="{{old('phonenumber')}}">
                    <span class="focus-input100" data-symbol="&#9743;"></span>
                </div>
                @error('phonenumber')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="wrap-input100 validate-input m-t-23">
                    <span class="label-input100">Email</span>
                    <input class="input100" type="text" name="email" placeholder="Type your email" value="{{old('email')}}">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>
                @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="wrap-input100 validate-input m-t-23 input-container">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Type your password" id="password" >
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <i class="fas fa-eye-slash" id="togglePasswordIconpassword"></i>
                    </span>
                </div>
                @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="wrap-input100 validate-input m-t-23 input-container">
                    <span class="label-input100">Confirm Password</span>
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirm your password" id="password_confirmation">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye-slash" id="togglePasswordIconpassword_confirmation"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror

                <div class="container-login100-form-btn p-t-50">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">
                            Sign Up
                        </button>
                    </div>
                </div>

                <div class="flex-col-c p-t-50">
                    <a wire:navigate href="{{ route('login')}}" class="txt2">
                        <p class="txt3">Already have an account?</p>
                        <strong>Login Now!</strong> 
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/loginregis.js') }}"></script>
@endsection
