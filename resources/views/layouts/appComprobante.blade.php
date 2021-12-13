<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Infomec') }}</title> --}}

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Template assets -->
    {{-- <link rel="stylesheet" href='assets/bootstrap/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/contextMenu.css"> --}}
    {{-- <link rel="shortcut icon" type="image/x-icon" href="logo.png" /> --}}
    {{-- <link href="{{ public_path('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ public_path('assets/css/common.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body id="page-top">
    <div id="app">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid" style="padding-top: 18px;">
                        @yield('content')
                    </div>
                </div>
            </div>     
        </div>
    </div>
</body>
<!-- Template assets -->

</html>
