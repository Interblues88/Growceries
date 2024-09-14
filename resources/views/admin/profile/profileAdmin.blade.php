@extends('layouts.appAdmin')

@push('head')

@endpush

@section('title', 'Admin Profile')



@section('content')
    {{-- <p>tes keluar gak</p>/ --}}

    <style>
        .banner{
            width: 100vw;
            height: 28vh;
        }
        .banner_img{
            width: 100%;
            height: 100%;
            /* vertical-align: middle;
            horizontal-align: center; */
        }
        .field{
            height: calc(100vh - 96.36px);
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        .box{
            border: solid 2px rgb(4, 183, 40);
            width: 45%;
            height: 70%;
            border-radius:12px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
            background-image: url('/image/bg_card.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: rgba(255, 255, 255, 0.5); /* White color with 50% opacity */
            background-blend-mode: multiply;
        }
        .pp{
            border: solid 2px rgb(4, 183, 40);
            width: 160px;
            height: 160px;
            /* border-radius:12px; */
            /* background-color: #bbb; */
            border-radius: 50%;
            display: inline-block;
            overflow: hidden;

        }
        .pp img{
            object-fit: cover;
        }
        .innerbox{
            width: 50%;
            height:65%;
            border: solid 2px rgb(4, 183, 40);
            border-radius: 12px;
            padding: 0px 10px;
            padding-bottom: 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: white;
        }
        #nama{
            font-size: 24px;
            font-weight: 800;
        }
        .bot{
            /* margin-bottom:1vw; */
        }
        p{
            font-weight: 600;
        }
        #quote{
            text-align: center;
            font-size: 12px;
            margin-top: 8px;
            background-color: rgb(190, 250, 190);
            border-radius: 8px;
            padding: 5px 5px;
        }
        .line{
            /* background-color: black; */
            border: solid rgba(16, 116, 32, 0.5) 1px;
            border-radius: 5px;
            width: 100%;
            /* height: 3px; */
        }
        .bot p{
            font-size: 12px;

        }
        .up h3{

            font-size: 12px;
        }
        .bot h3{
            font-size: 10px;
        }
    </style>

    {{-- <div class="banner">
        <img class="banner_img" src="{{ asset('image/profileBanner.png') }}" alt="">
    </div> --}}
    <div class="field">
        <div class="box">
            <span class="pp">
                <img src="{{$admin->image()}}" alt="">
            </span>
            <div class="innerbox">
                <div class="up">
                    <h3 id="nama" >{{$admin->name}}</h3>
                    <div class="line"></div>
                    <h3 id="email" >{{$admin->email}}</h3>
                    <div class="line"></div>
                    <h3 id="noHP" >{{$admin->phoneNumber}}</h3>
                    <div class="line"></div>
                    <h3 id="quote">"Challenges are what make life interesting and overcoming them is what makes life meaningful"</h3>
                </div>
                <div class="bot">
                    <p>Joined At :</p>
                    <h3>{{$admin->created_at}}</h3>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
    