<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'oferta_alumno')
            ->withPivot('observaciones');
    }
    
}
