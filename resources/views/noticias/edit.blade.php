@extends('layouts.app')

@section('content')
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
                                            <h4 class="mt-0 header-title">Datos de la noticia</h4>
                                            <p class="alert alert-danger alert-dismissible fade show"><code class="text-danger">Todos los campos son requeridos</code></p>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('noticias.update', $noticias->id) }}" class="mb-0">
                                                @csrf
                                                @method('PUT')
                                                    <div class="form-group">
                                                        <label for="id" class="bmd-label-floating ">ID</label>
                                                        <input type="text" class="form-control" id="id" name="id" value="{{ $noticias->id }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="titulo" class="bmd-label-floating ">Titulo</label>
                                                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $noticias->titulo) }}">
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
                                                        <label for="descripcion_corta" class="bmd-label-floating ">Descripcion Corta</label>
                                                        <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta', $noticias->descripcion_corta) }}">
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
                                                        <textarea id="elm1" name="descripcion_larga">{{ old('descripcion_larga', $noticias->descripcion_larga) }}</textarea>
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
                                                    <div class="form-group">
                                                        <label for="estado" class="bmd-label-static">Estado</label>
                                                        <div class="mt-3">
                                                            <div class="mb-0">
                                                                <div class="switch">
                                                                    <label>
                                                                    @if($noticias->estado == 1)
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
                                                        <input type="text" id="estado" name="estado" value="{{ old('estado', $noticias->estado) }}" class="mt-3" hidden="">
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
                                                    <!--<div class="form-group">
                                                        <label for="estado" class="bmd-label-floating">Estado</label>
                                                        <form class="mb-0 mt-2">
                                                            <div class="switch">
                                                                <label>                                                                
                                                                    <input type="checkbox" checked>
                                                                </label>
                                                            </div>
                                                        </form>
                                                    </div>-->
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0">Actualizar</button>
                                                    <a href="{{ route('noticias.index') }}" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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
<script>
    tinymce.init({
        selector: 'elm1',  // change this value according to your HTML
        language_URL: 'public/template/assets/plugins/tinymce/langs/es_MX.js'  // site absolute URL
    });
</script>    
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
$(document).ready(function(){
	
});
</script>
@endsection