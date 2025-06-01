<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ape1',
        'ape2',
        'email',
        'telefono',
        'direccion',
        'ciudad',
        'fecha_nacimiento',
        'dni'
    ];

    public function ofertas()
    {
        return $this->belongsToMany(Oferta::class, 'oferta_alumno');
    }
}
