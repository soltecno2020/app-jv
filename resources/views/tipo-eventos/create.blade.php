@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group m-0 pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Urora</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Crear tipo de evento</h4>
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
                            <div class="col-md-12 col-xl-12">
                                <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Datos del tipo de evento</h4>
                                            <p class="text-muted font-14"><code class="text-danger">Todos los campos son requeridos *</code></p>
                                            <div class="general-label">
                                                <form method="POST" action="{{ route('tipoEventos.store') }}" class="mb-0">
                                                @csrf
                                                    <div class="form-group">
                                                        <label for="nombre" class="bmd-label-floating ">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre">
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
                                                        <input type="text" id="estado" name="estado" value="1">
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
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0">Añadir nuevo</button>
                                                    <a href="{{ route('tipoEventos.index') }}" class="btn btn-raised btn-danger mb-0">Cancelar</a>
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

<!-- App js -->
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap-switch.js') }}"></script>
<script src="{{ asset('template/assets/js/bootstrap-switch.min.js') }}"></script>
<script>
$(document).ready(function(){
	
});
</script>
@endsection
