@extends('layouts.app')

@section('content')
@toastr_css
<style>
    ul {
        list-style-type: none;
        margin: 3;
        padding: 0;

    }

    .border2 {
        border-radius: 2em;
        border: 1px solid black;
        background-color: #CCAF60;
        padding: 10px;
    }

    .border1 {
        border-radius: 2em;
        border: 1px solid black;
        background-color: #D24848;
        padding: 10px;
    }

    #idUl li {
        list-style: none;
    }

    div.idDiv {
        float: right;
    }

    div.idDiv2 {
        float: left;
    }
</style>

<div class="wrapper">
    <div class="container-fluid">
        <div class="col-md-12 offset-md-2">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-8">
                <div class="card m-b-30">
                    <h3 class="card-header">
                        Respuesta a consulta
                    </h3>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="idDiv2">
                                    <ul class="border2">
                                        <li>Hola, quisiera hacer una consulta.</li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="idDiv">
                                    <ul class="border1">
                                        <li>Dime, ¿en que puedo ayudarte?</li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="idDiv2">
                                    <ul class="border2">
                                        <li>¿Como puedo ingresar mi vivienda en mi registro?</li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="idDiv">
                                    <ul class="border1">
                                        <li>Un Administrador puede ingresar tu vivienda correspondiente para ti.</li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="idDiv2">
                                    <ul class="border2">
                                        <li>Ok, Muchas gracias!!</li>
                                    </ul>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="idDiv">
                                    <ul class="border1">
                                        <li>De nada :).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Escriba su mensaje..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('template/assets/js/app.js') }}"></script>
@toastr_js
@toastr_render
@endsection