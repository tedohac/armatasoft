@extends('layout.master', ['title' => 'Armatasoft'])

@section('head')
    
    <!-- SB Admin Template -->
    <link href="{{ asset('styles/sb-admin.css?v=').time() }}" rel="stylesheet">

    <style>
        .font-20 {
            font-size: 20px;
        }
        .english-img {
            height: 240px;            
            background-image: url("{{ url('img/bg-armatasoft.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            margin-bottom: 40px;
        }
        .english-img h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 1.25rem;
            width: 100%;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    @if(Auth::check())
        <div class="text-right">Welcome {{ auth()->user()->username_email }}<div>
        <br />
    @endif
    <div class="row text-left">
    </div>

@endsection
