@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@toastr_css
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group m-0 pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Junta vecinal Monte Darwin</a></li>
                            <li class="breadcrumb-item active">Noticias</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Noticias</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-sm-7 mx-auto">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h3 class="mt-0 header-title">{{ $noticias->titulo }}</h3>
                        <h6 class="mt-0 header">{{ $noticias->descripcion_corta }}</h6>
                        <p class="text-muted font-14"><?php echo "$noticias->descripcion_larga"; ?></p> 
                        <br>
                        <div class="">
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-left">Creador: <cite title="Source Title">{{ $noticias->user_created_id }}</cite></footer>
                            </blockquote>
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-right">Fecha de noticia: <cite title="Source Title">{{ \Carbon\Carbon::parse($noticias->created_at)->format('d-m-yy') }}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
@toastr_js
@toastr_render
<!-- Required datatable js -->
<script src="{{ asset('template/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('template/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('template/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/pages/datatables.init.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>

@endsection