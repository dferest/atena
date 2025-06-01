<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::with('empresa', 'alumnos')->latest()->get();
        return view('ofertas.index', compact('ofertas'));
    }

    public function create()
    {
        // Solo empresas pueden crear ofertas
        if (!auth()->user()->hasRole('empresa')) {
            abort(403);
        }
        return view('ofertas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);
        $empresa = auth()->user()->empresa;
        $empresa->ofertas()->create($request->all());
        return redirect()->route('ofertas.index')->with('success', 'Oferta creada');
    }

    public function show($id)
    {
        $oferta = Oferta::with('empresa', 'alumnos')->findOrFail($id);
        return view('ofertas.show', compact('oferta'));
    }

    public function apuntarse($id)
    {
        $oferta = Oferta::findOrFail($id);
        $alumno = auth()->user()->alumno;
        $oferta->alumnos()->syncWithoutDetaching([$alumno->id]);
        return back()->with('success', 'Te has inscrito en la oferta');
    }

    public function destroy($id)
    {
        $oferta = Oferta::findOrFail($id);
        // Solo empresa dueña o profesor puede borrar
        if (auth()->user()->hasRole('profesor') || (auth()->user()->hasRole('empresa') && $oferta->empresa_id == auth()->user()->empresa_id)) {
            $oferta->delete();
            return back()->with('success', 'Oferta eliminada');
        }
        abort(403);
    }

    public function desinscribirse($id)
    {
        $oferta = Oferta::findOrFail($id);
        $alumno = auth()->user()->alumno;
        $oferta->alumnos()->detach($alumno->id);
        return back()->with('success', 'Te has desinscrito de la oferta');
    }

    public function guardarObservaciones(Request $request, $ofertaId, $alumnoId)
    {
        if (!auth()->user()->hasRole('profesor')) {
            abort(403);
        }
        $request->validate([
            'observaciones' => 'nullable|string|max:100'
        ]);
        \DB::table('oferta_alumno')
            ->where('oferta_id', $ofertaId)
            ->where('alumno_id', $alumnoId)
            ->update(['observaciones' => $request->observaciones]);
        return back()->with('success', 'Observaciones guardadas');
    }
}
