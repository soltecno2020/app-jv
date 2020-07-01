@extends('layouts.app')

@section('content')
<!-- DataTables -->
<link href="{{ asset('template/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

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

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $noticias->links() }}
            </ul>    
        </nav>
        
        
        <div class="row">
        @if(count($noticias) > 0)
            @foreach($noticias as $noticia)
            <div class="col-md-12 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h3 class="mt-0 header-title">{{ $noticia->titulo }}</h3>
                        <h6 class="mt-0 header">{{ $noticia->descripcion_corta }}</h6>
                        <p class="text-muted font-14"><?php echo "$noticia->descripcion_larga"; ?></p>
                        <br>
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @if(count($imagenes) > 0)
                                    @foreach($imagenes as $imagen)
                                        @if($imagen->estado == 1)
                                            @if($loop->first) <!-- verifica si el elemento actual es el primero -->
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" width="1000" height="600" src="{{ asset('template/assets/images/carousel/'.$imagen->nombre.$imagen->extension.'') }}" alt="First slide">
                                                </div>
                                            @else
                                                 <div class="carousel-item">
                                                    <img class="d-block img-fluid" width="1000" height="600" src="{{ asset('template/assets/images/carousel/'.$imagen->nombre.$imagen->extension.'') }}" alt="First slide">
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach   
                                @endif
                            </div>
                        </div> 
                        <br>
                        <div class="">
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-left">Creador: <cite title="Source Title">{{ $noticia->user_created_id }}</cite></footer>
                            </blockquote>
                            <blockquote class="blockquote mb-0">
                                <footer class="blockquote-footer float-right">Fecha de noticia: <cite title="Source Title">{{ \Carbon\Carbon::parse($noticia->created_at)->format('d-m-yy') }}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        </div><!--end row-->
    </div>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{ $noticias->links() }}
    </ul>    
</nav>

                     
                    

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