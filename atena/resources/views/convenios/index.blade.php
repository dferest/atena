@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold text-red-400 my-6">📄 Listado de convenios</h1>
    <a href="{{ route('convenios.create') }}"
       class="inline-block mb-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
        ➕ Nuevo convenio
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
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">Nº Convenio</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">🏢 Empresa</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">👨‍🏫 Profesor</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">🎓 Alumnos</th>
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">🛠️ Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($convenios as $convenio)
                    @if(
                        (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $convenio->empresa_id)
                        || auth()->user()->hasRole('profesor')
                        || auth()->user()->hasRole('admin')
                    )
                    <tr class="border-b border-gray-700">
                        <td class="px-3 py-2">
                            <a href="{{ route('convenios.show', $convenio->id) }}" class="text-red-400 hover:underline">
                                {{ $convenio->numero_convenio }}
                            </a>
                        </td>
                        <td class="px-3 py-2">{{ ucfirst($convenio->empresa->nombre ?? '-') }}</td>
                        <td class="px-3 py-2">{{ $convenio->profesor ? ucfirst($convenio->profesor->nombre) . ' ' . ucfirst($convenio->profesor->ape1) : '-' }}</td>
                        <td class="px-3 py-2">
                            @if($convenio->alumnos->count())
                                <ul>
                                    @foreach($convenio->alumnos as $alumno)
                                        <li>{{ ucfirst($alumno->nombre) }} {{ ucfirst($alumno->ape1) }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span>-</span>
                            @endif
                        </td>
                        <td class="px-3 py-2 space-x-1">
                            <a href="{{ route('convenios.edit', $convenio->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded">✏️</a>
                            <form action="{{ route('convenios.destroy', $convenio->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-2 py-1 bg-red-600 text-white rounded">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                @if($convenios->isEmpty())
                <tr>
                    <td colspan="5" class="px-3 py-4 text-center text-gray-400">No hay convenios registrados</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection