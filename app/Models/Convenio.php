<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_convenio',
        'nif_centro',
        'empresa_id',
        'profesor_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_convenio');
    }
}
