@extends('layouts.app')

@section('content')

<!-- Plugins css -->
<link href="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />
<link href="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.css') }}" rel="stylesheet" />


<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <!--
                    <div class="btn-group m-0 pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Urora</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    -->
                    <!--<h4 class="page-title">Crear tipo de evento</h4>
                        -->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12 col-xl-12 ">
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}.
                </div>
                @endif
                <div class="m-b-30">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-xl-6 offset-md-3">
                                <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Datos del usuario</h4>
                                            <p class="alert alert-danger alert-dismissible fade show">Todos los campos son requeridos</p>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('usuarios.store') }}" class="mb-0">
                                                @csrf
                                                    <div class="form-group is-focused">
                                                        <label for="name" class="bmd-label-floating ">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus>
                                                        @error('name')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="email" class="bmd-label-floating ">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" autofocus>
                                                        @error('email')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="password" class="bmd-label-floating ">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" autofocus>
                                                        @error('password')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="username" class="bmd-label-floating ">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" autofocus>
                                                        @error('username')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="apellido" class="bmd-label-floating ">Apellido</label>
                                                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" autofocus>
                                                        @error('apellido')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="telefono" class="bmd-label-floating ">Telefono</label>
                                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" autofocus>
                                                        @error('telefono')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="rut" class="bmd-label-floating ">Rut</label>
                                                        <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}" autofocus>
                                                        @error('rut')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="fecha_nacimiento" class="bmd-label-floating ">Fecha nacimiento</label>
                                                         <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                                                        @error('fecha_nacimiento') 
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group is-focused">
                                                        <label for="vivienda_id" class="bmd-label-floating ">Vivienda</label>
                                                         <input type="text" class="form-control" id="vivienda_id" name="vivienda_id" value="{{ old('vivienda_id') }}">
                                                        @error('vivienda_id') 
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">                                                        
                                                        <label for="estado" class="bmd-label-static">Estado</label>
                                                        <div class="mt-3">
                                                            <div class="mb-0">
                                                                <div class="switch">
                                                                    <label>
                                                                    <input type="checkbox" class="switchEstado" checked>
                                                                        <span id="lSwitchEstado" name="lSwitchEstado" class="text-success">Activo</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="estado" name="estado" value="1" class="mt-3" hidden="">
                                                        @error('estado')
                                                            <ul class="parsley-errors-list filled" id="parsley-id-9">
                                                                <li class="parsley-required">
                                                                    <strong>
                                                                        {{ $message }}
                                                                    </strong>
                                                                </li>
                                                            </ul>                                                                
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0">Añadir nuevo</button>
                                                    <a href="{{ route('usuarios.index') }}" class="btn btn-raised btn-danger mb-0">Cancelar</a>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div> <!-- end col -->                                                                                                              
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div> <!-- end container -->
</div>

<!--Wysiwig js-->   
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('template/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/timepicker/moment-with-locales.js') }}">
    moment.locale('es');
</script>
<script src="{{ asset('template/assets/plugins/timepicker/tempusdominus-bootstrap-4.js') }}"></script>
<script src="{{ asset('template/assets/plugins/timepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('template/assets/plugins/clockpicker/jquery-clockpicker.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ asset('template/assets/pages/form-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>



<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
$(document).ready(function(){
     $('#fecha_nacimiento').bootstrapMaterialDatePicker({
            weekStart : 0, 
            time: false 
        });

});
</script>
@endsection
