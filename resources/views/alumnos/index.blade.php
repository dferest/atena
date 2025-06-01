@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold text-red-400 my-6">Listado de Alumnos</h1>
    @if(!auth()->user()->hasRole('alumno'))
        <a href="{{ route('alumnos.create') }}" class="inline-block mb-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
            Nuevo Alumno
        </a>
    @endif
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded bg-opacity-10">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-gray-800 rounded shadow">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Nombre</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Apellidos</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Email</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Ciudad</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr class="border-b border-gray-700">
                    <td class="px-3 py-2">
                        @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('alumno') && auth()->user()->alumno_id == $alumno->id))
                            <a href="{{ route('alumnos.show', $alumno->id) }}" class="text-red-400 hover:underline">
                                {{ $alumno->nombre }}
                            </a>
                        @else
                            {{ $alumno->nombre }}
                        @endif
                    </td>
                    <td class="px-3 py-2">{{ $alumno->ape1 }} {{ $alumno->ape2 }}</td>
                    <td class="px-3 py-2">{{ $alumno->email }}</td>
                    <td class="px-3 py-2">{{ $alumno->ciudad }}</td>
                    <td class="px-3 py-2 space-x-1">
                        @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('alumno') && auth()->user()->alumno_id == $alumno->id))
                            <a href="{{ route('alumnos.edit', $alumno->id) }}"
                               class="inline-block px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                        @endif
                        @if(auth()->user()->hasRole('admin'))
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('¿Seguro que quieres eliminar este alumno?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach

                @if($alumnos->isEmpty())
                <tr>
                    <td colspan="5" class="px-3 py-4 text-center text-gray-400">No hay alumnos registrados</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection