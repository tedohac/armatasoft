<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('styles/style.css?v=').time() }}" rel="stylesheet">

    <!-- Font -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">

    <!-- Custom fonts for this template-->
    <link href="{{ url('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>

    <style>
        body {
            /* background: linear-gradient(to bottom, rgba(255,144,139,1), rgba(255,144,139,0));
            background-repeat: no-repeat; */
            background-color: #f9f9f9;
        }
        .content-armatasoft {
            margin-top: 120px;
        }
        .banner-front {
            background-image: url("{{ url('img/bg-header.png') }}");
            background-position: center top;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin-top: 80px;
            color: #fff;
        }
    </style>

    <title>{{ $title ?? config('app.name') }}</title>
    
    @yield('head')
</head>
<body>
    @include('layout.navbar')
    
    <div class="banner-front container w-100 shadow-sm">
        @yield('banner-front')
    </div>

    <div class="container content-armatasoft px-0">
        @yield('content')
    </div>
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('jquery/jquery.min.js') }}"></script>
    <script src="{{ url('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    @yield('bottom')
</body>