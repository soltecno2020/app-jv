<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $fillable = [
        'email', 'username', 'name', 'apellido', 'password', 'telefono', 'rut', 'fecha_nacimiento', 'created_at', 'estado'
    ];
}
