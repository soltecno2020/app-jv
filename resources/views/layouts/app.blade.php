<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Urora - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Morris Chart CSS -->
    <link href="{{ asset('template/assets/plugins/fullcalendar/vanillaCalendar.css') }}" rel="stylesheet" type="text/css"  />
    <link href="{{ asset('template/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/assets/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/plugins/metro/MetroJs.min.css') }}">

    <link  href="{{ asset('template/assets/plugins/carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('template/assets/plugins/carousel/owl.theme.default.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/assets/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/bootstrap-material-design.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet" type="text/css">
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

    <!-- Scripts -->
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

    <script src="{{ asset('template/assets/plugins/carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/fullcalendar/vanillaCalendar.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/metro/MetroJs.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('template/assets/plugins/morris/morris.min.js') }}"></script>  
    <script src="{{ asset('template/assets/pages/dashborad.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>
    <script src="{{ asset('js/init.js') }}" defer></script>
</body>
</html>
