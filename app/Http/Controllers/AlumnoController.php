<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ape1' => 'required|string|max:255',
            'ape2' => 'nullable|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'nullable|string|max:20',
        ]);

        $alumno = Alumno::create($request->all());

        $user = \App\Models\User::create([
            'name' => $alumno->nombre . ' ' . $alumno->ape1,
            'email' => $alumno->email,
            'password' => bcrypt('alumno'),
            'alumno_id' => $alumno->id,
        ]);
        $user->assignRole('alumno');

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado correctamente.');
    }

    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.show', compact('alumno'));
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'ape1' => 'required|string|max:255',
            'ape2' => 'nullable|string|max:255',
            'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'dni' => 'nullable|string|max:20',
        ]);

        $alumno->update($request->all());
        if ($alumno->user) {
            $alumno->user->update([
                'name' => $alumno->nombre . ' ' . $alumno->ape1,
                'email' => $alumno->email,
            ]);
        }

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        if ($alumno->user) {
            $alumno->user->delete();
        }

        $alumno->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente.');
    }
}
