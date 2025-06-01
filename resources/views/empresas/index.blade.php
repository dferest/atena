@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <h1 class="text-2xl font-bold text-red-400 my-6">Listado de Empresas</h1>

    @role('profesor|admin|empresa')
    <a href="{{ route('empresas.create') }}" class="mb-4 inline-block px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">Nueva Empresa</a>
    @endrole

    @if(session('success'))
    <div class="mb-4 p-3 rounded border text-green-800 bg-green-100 border-green-300 bg-opacity-10">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-gray-800 rounded shadow">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    @foreach(['Nombre','Email','Teléfono','Dirección','Ciudad','CEO','Acciones'] as $col)
                        <th class="px-3 py-2 text-left font-semibold text-gray-300">{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($empresas as $empresa)
                <tr class="border-b border-gray-700">
                    <td class="px-3 py-2">
                        <a href="{{ route('empresas.show', $empresa->id) }}" class="text-red-400 hover:underline">{{ $empresa->nombre }}</a>
                    </td>
                    <td class="px-3 py-2">{{ $empresa->email }}</td>
                    <td class="px-3 py-2">{{ $empresa->telefono }}</td>
                    <td class="px-3 py-2">{{ $empresa->direccion }}</td>
                    <td class="px-3 py-2">{{ $empresa->ciudad }}</td>
                    <td class="px-3 py-2">{{ $empresa->ceo }}</td>
                    <td class="px-3 py-2 space-x-1">
                        @if(
                            (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $empresa->id) ||
                            auth()->user()->hasRole('profesor') ||
                            auth()->user()->hasRole('admin')
                        )
                            <a href="{{ route('empresas.show', $empresa->id) }}"
                            class="inline-block px-2 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">Ver</a>
                        @endif

                        @if(
                            (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $empresa->id) ||
                            auth()->user()->hasRole('admin')
                        )
                            <a href="{{ route('empresas.edit', $empresa->id) }}"
                            class="inline-block px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                        @endif

                        @if(
                            (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $empresa->id) ||
                            auth()->user()->hasRole('admin')
                        )
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('¿Seguro que quieres eliminar esta empresa?');">
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

                @if($empresas->isEmpty())
                <tr>
                    <td colspan="7" class="px-3 py-4 text-center text-gray-400">No hay empresas registradas</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection