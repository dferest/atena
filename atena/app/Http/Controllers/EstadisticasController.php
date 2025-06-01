<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\Convenio;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        $numOfertas = Oferta::count();
        $numAlumnosInscritos = DB::table('oferta_alumno')->distinct('alumno_id')->count('alumno_id');
        $numConvenios = Convenio::count();

        $ofertas = Oferta::withCount('alumnos')->get(['id', 'titulo']);
        $ofertasLabels = $ofertas->pluck('titulo');
        $ofertasData = $ofertas->pluck('alumnos_count');

        return view('estadisticas.index', compact(
            'numOfertas', 'numAlumnosInscritos', 'numConvenios',
            'ofertasLabels', 'ofertasData'
        ));
    }
}