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
                    <h4 class="page-title">Crear tipo de evento</h4>
                    -->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Error!</strong> {{ Session::get('error') }}.
                </div>
                @endif
                <div class=" m-b-30">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6 col-xl-6 offset-md-3">
                                <div class="card m-b-30">
                                        <div class="card-body">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" >Datos de la cuenta</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('usuarios.index') }}">Seguridad</a>
                                    </li>
                                        </ul>
                                            <p class="alert alert-danger alert-dismissible fade show"><code class="text-danger">Todos los campos son requeridos</code></p>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('usuarios.update', $usuarios->id) }}" class="mb-0">
                                                @csrf
                                                @method('PUT')
                                                    <div class="form-group">
                                                        <label for="id" class="bmd-label-floating ">ID</label>
                                                        <input type="text" class="form-control" id="id" name="id" value="{{ $usuarios->id }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="bmd-label-floating ">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $usuarios->name) }}">
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
                                                    <div class="form-group">
                                                        <label for="email" class="bmd-label-floating ">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $usuarios->email) }}">
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
                                                    <div class="form-group">
                                                        <label for="password" class="bmd-label-floating ">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $usuarios->password) }}">
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
                                                     <div class="form-group">
                                                        <label for="username" class="bmd-label-floating ">Username </label>
                                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $usuarios->username) }}">
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
                                                    <div class="form-group">
                                                        <label for="apellido" class="bmd-label-floating ">Apellido</label>
                                                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $usuarios->apellido) }}">
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
                                                    <div class="form-group">
                                                        <label for="telefono" class="bmd-label-floating ">Telefono</label>
                                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $usuarios->telefono) }}">
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
                                                    <div class="form-group">
                                                        <label for="rut" class="bmd-label-floating ">Rut</label>
                                                        <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut', $usuarios->rut) }}">
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
                                                    <div class="form-group">
                                                        <label for="rut" class="bmd-label-floating ">Fecha nacimiento</label>
                                                        <input type="text" class="form-control" id="mdate" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', \Carbon\Carbon::parse($usuarios->fecha_nacimiento)->format('d-m-yy')) }}">   
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
                                                    
                                                    <div class="form-group">
                                                        <label for="vivienda_id" class="bmd-label-floating ">Vivienda</label>
                                                        <input type="text" class="form-control" id="vivienda_id" name="vivienda_id" value="{{ old('vivienda_id', $usuarios->vivienda_id) }}">
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
                                                                    @if($usuarios->estado == 1)
                                                                    <input type="checkbox" class="switchEstado" checked>
                                                                        <span id="lSwitchEstado" name="lSwitchEstado" class="text-success">Activo</span>
                                                                    </label>
                                                                    @else
                                                                    <input type="checkbox" class="switchEstado">
                                                                        <span id="lSwitchEstado" name="lSwitchEstado" class="text-danger">Inactivo</span>
                                                                    </label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="estado" name="estado" value="{{ old('estado', $usuarios->estado) }}" class="mt-3" hidden="">
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
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0">Actualizar</button>
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
<script src="{{ asset('template/assets/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap-switch.min.js') }}"></script>
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