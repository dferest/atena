<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nif',
        'email',
        'telefono',
        'direccion',
        'codigo_postal',
        'provincia',
        'pais',
        'ciudad',
        'ceo'
    ];

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }
}
