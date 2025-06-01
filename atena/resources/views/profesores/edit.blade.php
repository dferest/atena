@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-6 text-red-400">Editar Profesor</h1>
    <form method="POST" action="{{ route('profesores.update', $profesor->id) }}" class="bg-gray-800 p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-1">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $profesor->nombre) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500" required>
        </div>
        <div>
            <label class="block mb-1">Primer Apellido:</label>
            <input type="text" name="ape1" value="{{ old('ape1', $profesor->ape1) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500" required>
        </div>
        <div>
            <label class="block mb-1">Segundo Apellido:</label>
            <input type="text" name="ape2" value="{{ old('ape2', $profesor->ape2) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Email:</label>
            <input type="email" name="email" value="{{ old('email', $profesor->email) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500" required>
        </div>
        <div>
            <label class="block mb-1">Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono', $profesor->telefono) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Dirección:</label>
            <input type="text" name="direccion" value="{{ old('direccion', $profesor->direccion) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Ciudad:</label>
            <input type="text" name="ciudad" value="{{ old('ciudad', $profesor->ciudad) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $profesor->fecha_nacimiento) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">DNI:</label>
            <input type="text" name="dni" value="{{ old('dni', $profesor->dni) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Titulación:</label>
            <input type="text" name="titulacion" value="{{ old('titulacion', $profesor->titulacion) }}" class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">Actualizar</button>
            <a href="{{ route('profesores.index') }}" class="px-4 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection