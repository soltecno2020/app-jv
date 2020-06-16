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