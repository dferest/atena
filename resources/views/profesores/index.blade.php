@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold text-red-400 my-6">👨‍🏫 Listado de Profesores</h1>
    <a href="{{ route('profesores.create') }}" class="inline-block mb-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        ➕ Nuevo Profesor
    </a>
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded bg-opacity-10">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-gray-800 rounded shadow">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    @foreach(['Nombre', 'Apellidos', 'Email', 'Ciudad', 'Acciones'] as $header)
                        <th class="px-3 py-2 text-left font-semibold text-gray-300">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($profesores as $profesor)
                <tr class="border-b border-gray-700">
                    <td class="px-3 py-2">
                        @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('profesor') && auth()->user()->profesor_id == $profesor->id))
                            <a href="{{ route('profesores.show', $profesor->id) }}" class="text-red-400 hover:underline">
                                {{ ucfirst($profesor->nombre) }}
                            </a>
                        @else
                            {{ ucfirst($profesor->nombre) }}
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ ucfirst($profesor->ape1) }} {{ ucfirst($profesor->ape2) }}</td>
                    <td class="px-3 py-2">{{ $profesor->email }}</td>
                    <td class="px-3 py-2">{{ ucfirst($profesor->ciudad) }}</td>
                    <td class="px-3 py-2 space-x-1">
                        <a href="{{ route('profesores.show', $profesor->id) }}" class="inline-block px-2 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">👁 Ver</a>
                        @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('profesor') && auth()->user()->profesor_id == $profesor->id))
                            <a href="{{ route('profesores.edit', $profesor->id) }}" class="inline-block px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">✏️ Editar</a>
                        @endif
                        @if(auth()->user()->hasRole('admin'))
                            <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este profesor?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">🗑 Eliminar</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-3 py-4 text-center text-gray-400">📭 No hay profesores registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
