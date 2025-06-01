<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    protected $fillable = [
        'nombre',
        'ape1',
        'ape2',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'fecha_nacimiento',
        'dni',
        'titulacion'
    ];
}
