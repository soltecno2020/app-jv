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
                                        <h4 class="mt-0 header-title">Datos de la noticia</h4>
                                        <p class="alert alert-danger alert-dismissible fade show">Todos los campos son requeridos</p>
                                        <div class="general-label">
                                            <form method="POST" action="{{ route('noticias.store') }}" class="mb-0">
                                            @csrf
                                                <div class="form-group is-focused">
                                                    <label for="titulo" class="bmd-label-floating ">Titulo</label>
                                                    <input type="text" class="form-control" id="titulo" name="titulo" maxlength="50" value="{{ old('titulo') }}" autofocus>
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
                                                    <div class="form-group is-focused">
                                                    <label for="descripcion_corta" class="bmd-label-floating ">Descripcion corta</label>
                                                    <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" maxlength="100" value="{{ old('descripcion_corta') }}" autofocus>
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
                                                <div class="form-group is-focused">
                                                    <h5 class="mt-0 header-title">Descripcion larga</h5>
                                                    <textarea id="elm1" name="descripcion_larga" maxlength="10000" autofocus>{{ old('descripcion_larga') }}</textarea>
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
                                                <button type="submit" class="btn btn-primary btn-raised mb-0">Crear noticia</button>
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
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
$(document).ready(function(){

});
</script>
@endsection