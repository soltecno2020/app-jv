@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <div class="wrapper-page">
            <div class="display-table">
                <div class="display-table-cell">
                    <diV class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="index.html">
                                                <i class="mdi mdi-account"></i>Usuario</a>
                                            </a>
                                            <a href="index.html">
                                                <h2>BLABALBABALD;ASDLAS;DLAS</h2>
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0">
                        
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                         <a href="{{ route('usuarios.index') }}" class="btn btn-primary btn-raised btn-block waves-effect waves-light">Usuarios</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="index.html">
                                                <i class="mdi mdi-account"></i>Tipo Consultas</a>
                                            </a>
                                            <a href="index.html">
                                                <h2>BLABALBABALD;ASDLAS;DLAS</h2>
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0" action="{{ route('tipoConsultas.index') }}">
                        
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                        <a href="{{ route('tipoConsultas.index') }}" class="btn btn-primary btn-raised btn-block waves-effect waves-light">Tipo Consultas</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="index.html">
                                                <i class="mdi mdi-pencil-box"></i>Tipo Eventos</a>
                                            </a>
                                            <a href="index.html">
                                                <h2>BLABALBABALD;ASDLAS;DLAS</h2>
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0">
                        
                                                <div class="form-group text-right row m-t-20" action="{{ route('tipoEventos.index') }}">
                                                    <div class="col-12">
                                                       <a href="{{ route('tipoEventos.index') }}" class="btn btn-primary btn-raised btn-block waves-effect waves-light">Eventos</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="index.html">
                                                <i class="mdi mdi-newspaper"></i>Noticias</a>
                                            </a>
                                            <a href="index.html">
                                                <h2>BLABALBABALD;ASDLAS;DLAS</h2>
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0" action="index.html">
                        
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                        <a href="{{ route('noticias.index') }}" class="btn btn-primary btn-raised btn-block waves-effect waves-light">Noticias</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center pt-3">
                                            <a href="index.html">
                                                <i class="mdi mdi-pencil-box"></i>Formulario</a>
                                            </a>
                                            <a href="index.html">
                                                <h2>BLABALBABALD;ASDLAS;DLAS</h2>
                                            </a>
                                        </div>
                                        <div class="px-3 pb-3">
                                            <form class="form-horizontal m-t-20 mb-0" action="index.html">
                        
                                                <div class="form-group text-right row m-t-20">
                                                    <div class="col-12">
                                                        <a href="{{ route('formularioscontactos.index') }}" class="btn btn-primary btn-raised btn-block waves-effect waves-light">Formularios</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </diV>
                </div>
            </div>

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
