@extends('layouts.app')

@section('content')

<!--calendar css-->
<link href="{{ asset('template/assets/fullcalendar/packages/core/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/daygrid/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/timegrid/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/list/main.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/fullcalendar/packages/interaction/main.css') }}" rel="stylesheet" />
@toastr_css
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],
        defaultView:'dayGridMonth',
        header:{
            left:'prev,next today nuevoEvento',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons:{
            nuevoEvento:{
                text:"Crear nuevo evento",
                click:function(){
                    toastr.success("Acabas de crear una noticia");
                }
            }
        },
        dateClick:function(info){
            toastr.info("Datos del dia");
            console.log(info);
        }
    });
        calendar.setOption('locale','Es')
        calendar.render();
    });
</script>
@toastr_js
@toastr_render
<!-- Codigo fullcalendar -->
<script src="{{ asset('template/assets/fullcalendar/packages/core/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/daygrid/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/timegrid/main.js') }}"></script>

<!-- Plugins fullcalendar -->
<script src="{{ asset('template/assets/fullcalendar/packages/list/main.js') }}"></script>
<script src="{{ asset('template/assets/fullcalendar/packages/interaction/main.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>

@endsection