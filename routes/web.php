<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tipoEventos', 'TipoEventosController');
Route::prefix('tipoEventos')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'tipoEventos.cambiarEstado',
        'uses' => 'TipoEventosController@cambiarEstado',
    ]);
});


Route::resource('tipoConsultas', 'TipoConsultasController');
Route::prefix('tipoConsultas')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'tipoConsultas.cambiarEstado',
        'uses' => 'TipoConsultasController@cambiarEstado',
    ]);
});

Route::resource('formularioscontactos', 'FormulariosContactosController');
Route::prefix('formularioscontactos')->group(function() {
	Route::post('/cambiarEstado', [
        'as'   => 'formularioscontactos.cambiarEstado',
        'uses' => 'FormulariosContactosController@cambiarEstado',
    ]);
});

Route::resource('viviendas', 'ViviendasController');
Route::prefix('viviendas')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'viviendas.cambiarEstado',
        'uses' => 'ViviendasController@cambiarEstado',
    ]);
});

Route::get('noticias/mostrar', 'NoticiasController@mostrar')->name('noticias.mostrar'); 
Route::resource('noticias', 'NoticiasController');
Route::prefix('noticias')->group(function() {
    Route::post('/cambiarEstado', [
        'as'   => 'noticias.cambiarEstado',
        'uses' => 'NoticiasController@cambiarEstado',
    ]);
});
Route::resource('eventos', 'EventosController');