<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Villa Monte Darwin</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('template/assets/images/logo.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('template/assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap-material-design.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- jQuery  -->
    <script src="{{ asset('template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/bootstrap-material-design.js') }}"></script>
    <script src="{{ asset('template/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/detect.js') }}"></script>
    <script src="{{ asset('template/assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('template/assets/js/waves.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('template/assets/js/jquery.scrollTo.min.js') }}"></script>

</head>
<body>
    <!-- Navigation Bar-->
    <header id="topnav">
        @include('layouts.top-menu')
        @include('layouts.top-sub-menu')
    </header>
    <!-- end topbar-main -->

    @yield('content')

    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>
    @include('layouts.footer')
    
</body>
</html>