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
                                        <h4 class="mt-0 header-title">Datos del Evento</h4>
                                        <p class="alert alert-danger alert-dismissible fade show"><code class="text-danger">Todos los campos son requeridos</code></p>
                                        <div class="general-label">
                                            <form method="POST" action="{{ route('eventos.update', $eventos->id) }}" class="mb-0">
                                            @csrf
                                            @method('PUT')
                                                <div class="form-group">
                                                    <label for="id" class="bmd-label-floating ">ID</label>
                                                    <input type="text" class="form-control" id="id" name="id" value="{{ $eventos->id }}" disabled>
                                                </div>
                                                <div class="form-group is-focused">
                                                <label for="nombre" class="bmd-label-floating ">Nombre</label>
                                                <input type="text" class="form-control" id="alloptions" name="nombre" maxlength="45" value="{{ old('nombre', $eventos->nombre) }}" autofocus>
                                                @error('nombre')
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
                                                <label for="titulo" class="bmd-label-floating ">Titulo</label>
                                                <input type="text" class="form-control" id="alloptions" name="titulo" maxlength="20" value="{{ old('titulo', $eventos->titulo) }}">
                                                @error('titulo')
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
                                                <label for="descripcion_corta" class="bmd-label-floating ">Descripcion corta</label>
                                                <input type="text" class="form-control" id="alloptions" name="descripcion_corta" maxlength="200" value="{{ old('descripcion_corta', $eventos->descripcion_corta) }}">
                                                @error('descripcion_corta')
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
                                                <h5 class="mt-0 header-title">Descripcion larga</h5>
                                                <textarea id="elm1"  name="descripcion_larga" maxlength="10000" autofocus>{{ old('descripcion_larga', $eventos->descripcion_larga) }}</textarea>
                                                @error('descripcion_larga')
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
                                                <select class="form-control" id="tipo_eventos_id" name="tipo_eventos_id">
                                                    <option value="0">Seleccione un tipo de evento</option>
                                                @foreach($tipoEventos as $tipoEvento)
                                                    <option {{ old('tipo_evento_id') == $tipoEvento->id ? 'selected' : '' }} value="{{ ($tipoEvento->id) }}">{{ ($tipoEvento->nombre) }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <h6 class="text-muted">Fecha de inicio</h6>
                                                    <input type="text" class="form-control" id="mdate" name="fecha_inicio" value="{{ old('fecha_inicio', \Carbon\Carbon::parse($eventos->fecha_inicio)->format('d-m-yy')) }}">    
                                                </div>
                                            </div>
                                            <div class="form-group">    
                                                <div class="col-md-6">
                                                    <h6 class="text-muted">Fecha de termino</h6>
                                                    <input type="text" class="form-control" id="mdate" name="fecha_termino" value="{{ old('fecha_termino', \Carbon\Carbon::parse($eventos->fecha_termino)->format('d-m-yy')) }}">   
                                                </div>       
                                            </div>       
                                            <div class="form-group">   
                                                <div class="col-md-6">
                                                    <h6 class="text-muted mt-3">Hora de inicio</h6>
                                                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true" autocomplete="false">
                                                        <input type="text" class="form-control" name="hora_inicio" value="{{ old('hora_inicio', \Carbon\Carbon::parse($eventos->hora_inicio)->format('H:m')) }}"> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">     
                                                <div class="col-md-6">    
                                                    <h6 class="text-muted mt-3">Hora de termino</h6>
                                                    <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" name="hora_termino" value="{{ old('hora_termino', \Carbon\Carbon::parse($eventos->hora_termino)->format('H:m')) }}"> 
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group is-focused">
                                                <label for="lugar" class="bmd-label-floating ">Lugar de encuentro</label>
                                                <input type="text" class="form-control" id="alloptions" name="lugar" maxlength="200" value="{{ old('lugar', $eventos->lugar) }}" autofocus>
                                                @error('lugar')
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
                                                                @if($eventos->estado == 1)
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
                                                    <input type="text" id="estado" name="estado" value="{{ old('estado', $eventos->estado) }}" class="mt-3" hidden="">
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
                                                <a href="{{ route('eventos.index') }}" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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
<script>
    $(document).ready(function(){
    
    });
</script>
@endsection