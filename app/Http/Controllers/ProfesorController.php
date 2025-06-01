<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ape1' => 'required|string|max:255',
            'ape2' => 'nullable|string|max:255',
            'email' => 'required|email|unique:profesores,email',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'nullable|string|max:20',
            'titulacion' => 'nullable|string|max:255',
        ]);

        $profesor = Profesor::create($request->all());

        $user = \App\Models\User::create([
            'name' => $profesor->nombre . ' ' . $profesor->ape1,
            'email' => $profesor->email,
            'password' => bcrypt('profesor'),
            'profesor_id' => $profesor->id,
        ]);
        $user->assignRole('profesor');

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor creado correctamente.');
    }

    public function show($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.show', compact('profesor'));
    }

    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'ape1' => 'required|string|max:255',
            'ape2' => 'nullable|string|max:255',
            'email' => 'required|email|unique:profesores,email,' . $profesor->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'nullable|string|max:20',
            'titulacion' => 'nullable|string|max:255',
        ]);

        $profesor->update($request->all());
        if ($profesor->user) {
            $profesor->user->update([
                'name' => $profesor->nombre . ' ' . $profesor->ape1,
                'email' => $profesor->email,
            ]);
        }

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);

        // Elimina el usuario relacionado si existe
        if ($profesor->user) {
            $profesor->user->delete();
        }

        $profesor->delete();

        return redirect()->route('profesores.index')
            ->with('success', 'Profesor eliminado correctamente.');
    }
}
