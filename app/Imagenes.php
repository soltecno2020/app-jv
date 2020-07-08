<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table = 'imagenes';
    protected $fillable = [
        'nombre', 'tipo', 'extension', 'portada', 'estado', 'created_at', 'updated_at', 'relacion_id' 
    ];
    protected $timestamp = true;
}
