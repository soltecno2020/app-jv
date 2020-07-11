@extends('layouts.app')

@section('content')

<!-- Dropzone css -->
<link href="{{ asset('template/assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">

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
                                            <form method="POST" action="{{ route('noticias.store') }}" class="mb-0" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
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
                                                <div class="form-group">
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
                                                <button type="button" id="nuevaImagen" class="btn btn-raised btn-primary">Agregar imagen</button> <!-- data-toggle="modal" data-target=".bd-example-modal-form"  -->
                                                <div id="modal-agregar-imagen" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalform">Subir Imagen</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="file" class="dropify" id="imagen" name="imagen">
                                                                </div>
                                                            </div>                                          
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" id="btn-modal-agregar-imagen" class="btn btn-raised btn-primary ml-2">Subir imagen</button>
                                                            </div>
                                                        </div>        
                                                    </div>
                                                </div>
                                                <div>
                                                    <table id="tablaElementos" class="table mb-0">
                                                        <thead class="thead-default">
                                                            <tr>
                                                                <th>Nombre imagen</th>
                                                                <th>Imagen</th>
                                                                <th>Link</th>
                                                                <th class="text-right">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group">
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

<!-- Dropzone js -->
<script src="{{ asset('template/assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/upload-init.js') }}"></script>

<!--Wysiwig js-->   
<script src="{{ asset('template/assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('template/assets/pages/form-editor-init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        
    });
</script>
<script>
    var idElemento = 0;

    $('#nuevaImagen').click(function(e){
        e.preventDefault();
        $('#modal-agregar-imagen').modal('show');
    });

    $('#btn-modal-agregar-imagen').click(function(e){
        e.preventDefault();
        subirImagen();
    });

    $('.borrar').click(function(e){
        e.preventDefault();
        var elemento = this.id.split('_');
        var idElemento = elemento[1];
        $('#tr_'+idElemento).remove();
    });

    function subirImagen(){
        idElemento++;
        $('#tablaElementos tbody').append(
        '<tr id="tr_"'+idElemento+'">'+
            '<td><input id="input_imagen_" class="form-control" type="text" disabled="on"></td>'+
            '<td><img src=""></img></td>'+
            '<td><button class="link btn btn-raised btn-primary ml-2" data-url=""></button></td>'+
            '<td><div class="float-right"><div class="icon-demo-content row"><a id="bImagen_'+idElemento+'" href="" data-url=""><div class="col-sm-6 m-0"><i class="mdi mdi-close"></i></div></a></div></div></td>'+
        '</tr>');
        $('#modal-agregar-imagen').modal('hide');
    }
    

</script>
@endsection