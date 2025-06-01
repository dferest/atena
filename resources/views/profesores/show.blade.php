@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <div class="bg-gray-800 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-red-400">👤 {{ ucfirst($profesor->nombre) }} {{ ucfirst($profesor->ape1) }} {{ ucfirst($profesor->ape2) }}</h1>
        <ul class="space-y-2 text-gray-100">
            <li><span class="font-semibold">📧 Email:</span> {{ $profesor->email }}</li>
            <li><span class="font-semibold">📞 Teléfono:</span> {{ $profesor->telefono }}</li>
            <li><span class="font-semibold">🏠 Dirección:</span> {{ ucfirst($profesor->direccion) }}</li>
            <li><span class="font-semibold">🌆 Ciudad:</span> {{ ucfirst($profesor->ciudad) }}</li>
            <li><span class="font-semibold">🎂 Fecha de nacimiento:</span> {{ $profesor->fecha_nacimiento }}</li>
            <li><span class="font-semibold">🆔 DNI:</span> {{ strtoupper($profesor->dni) }}</li>
            <li><span class="font-semibold">🎓 Titulación:</span> {{ ucfirst($profesor->titulacion) }}</li>
        </ul>
        <div class="flex space-x-2 mt-6">
            <a href="{{ route('profesores.edit', $profesor->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">✏️ Editar</a>
            <a href="{{ route('profesores.index') }}" class="px-4 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600">🔙 Volver</a>
        </div>
    </div>
</div>
@endsection
