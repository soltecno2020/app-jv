@extends('layouts.app')

@section('content')

<!--calendar css-->
<link href="{{ asset('template/assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />

<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Calendario</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row">
                            <div id='calendar' class="col-xl-12 col-lg-9 col-md-8"></div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Jquery-Ui -->
<script src="{{ asset('template/assets/plugins/moment/moment-with-locales.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/calendar-init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>

@endsection