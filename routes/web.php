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