<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nombre' => 'required|string|max:255',
        'nif' => 'required|string|max:255',
        'email' => 'required|email|unique:empresas,email',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'ciudad' => 'nullable|string|max:255',
        'ceo' => 'nullable|string|max:255',
    ]);

    $empresa = Empresa::create($request->all());
    $user = \App\Models\User::create([
        'name' => $empresa->nombre,
        'email' => $empresa->email,
        'password' => bcrypt('empresa'),
        'empresa_id' => $empresa->id,
    ]);
    $user->assignRole('empresa');

    return redirect()->route('empresas.index')
        ->with('success', 'Empresa y usuario creados correctamente.');
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.show', compact('empresa'));
    }

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'nif' => 'required|string|max:255',
            'email' => 'required|email|unique:empresas,email,' . $empresa->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'ceo' => 'nullable|string|max:255',
        ]);

        $empresa->update($request->all());

        // Opcional: actualizar también el usuario relacionado
        if ($empresa->user) {
            $empresa->user->update([
                'name' => $empresa->nombre,
                'email' => $empresa->email,
            ]);
        }

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);

        // Elimina el usuario relacionado si existe
        if ($empresa->user) {
            $empresa->user->delete();
        }

        $empresa->delete();

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa eliminada correctamente.');
    }
}
