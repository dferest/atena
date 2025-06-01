<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convenio;
use App\Models\Empresa;
use App\Models\Profesor;
use App\Models\Alumno;
use Barryvdh\DomPDF\Facade\Pdf;

class ConvenioController extends Controller
{
    public function index()
    {
        $convenios = Convenio::with(['empresa', 'profesor', 'alumnos'])->get();
        return view('convenios.index', compact('convenios'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        $profesores = Profesor::all();
        $alumnos = Alumno::all();
        return view('convenios.create', compact('empresas', 'profesores', 'alumnos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero_convenio' => 'required|string|max:50',
            'empresa_id'      => 'required|exists:empresas,id',
            'profesor_id'     => 'required|exists:profesores,id',
            'alumnos'         => 'array',
            'alumnos.*'       => 'exists:alumnos,id',
        ]);

        $empresa = Empresa::findOrFail($data['empresa_id']);

        $convenio = Convenio::create([
            'numero_convenio' => $data['numero_convenio'],
            'empresa_id'      => $data['empresa_id'],
            'profesor_id'     => $data['profesor_id'],
            'nif'             => $empresa->nif,
        ]);

        if (!empty($data['alumnos'])) {
            $convenio->alumnos()->sync($data['alumnos']);
        }

        return redirect()->route('convenios.index')
                        ->with('success', 'Convenio creado correctamente');
    }

    public function show($id)
    {
        $convenio = Convenio::with(['empresa', 'profesor', 'alumnos'])->findOrFail($id);
        return view('convenios.show', compact('convenio'));
    }

    public function edit($id)
    {
        $convenio = Convenio::with(['alumnos'])->findOrFail($id);
        $empresas = Empresa::all();
        $profesores = Profesor::all();
        $alumnos = Alumno::all();
        return view('convenios.edit', compact('convenio', 'empresas', 'profesores', 'alumnos'));
    }

    public function update(Request $request, $id)
    {
        $convenio = Convenio::findOrFail($id);

        $data = $request->validate([
            'numero_convenio' => 'required|string|max:50',
            'empresa_id'      => 'required|exists:empresas,id',
            'profesor_id'     => 'required|exists:profesores,id',
            'alumnos'         => 'array',
            'alumnos.*'       => 'exists:alumnos,id',
        ]);

        $empresa = Empresa::findOrFail($data['empresa_id']);

        $convenio->update([
            'numero_convenio' => $data['numero_convenio'],
            'empresa_id'      => $data['empresa_id'],
            'profesor_id'     => $data['profesor_id'],
            'nif'             => $empresa->nif,
        ]);

        $convenio->alumnos()->sync($data['alumnos'] ?? []);

        return redirect()->route('convenios.index')
                        ->with('success', 'Convenio actualizado correctamente');
    }

    public function destroy($id)
    {
        $convenio = Convenio::findOrFail($id);
        $convenio->alumnos()->detach();
        $convenio->delete();

        return redirect()->route('convenios.index')
                        ->with('success', 'Convenio eliminado correctamente');
    }

    public function pdf($id)
    {
        $convenio = Convenio::with(['empresa', 'profesor', 'alumnos'])->findOrFail($id);
        $centro = [
            'nombre'        => 'IES Barajas',
            'nif_centro'    => 'B12345678',
            'direccion'     => 'Avenida de America, 197',
            'cp'            => '28425',
            'provincia'     => 'Madrid',
            'telefono'      => '695482365',
            'fax'           => '912345679',
        ];
        $pdf = PDF::loadView('convenios.pdf', compact('convenio','centro'));
        return $pdf->download("convenio_{$convenio->numero_convenio}.pdf");
    }
}
