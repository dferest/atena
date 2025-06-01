@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-6 text-red-400">📢 Ofertas de Prácticas</h1>

    @role('empresa')
    <a href="{{ route('ofertas.create') }}" class="mb-4 inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">➕ Nueva Oferta</a>
    @endrole

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded bg-opacity-10">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-gray-800 rounded shadow overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr>
                    @foreach(['título', 'empresa', 'descripción', 'acciones'] as $col)
                    <th class="px-3 py-2 text-left font-semibold text-gray-300">{{ ucfirst($col) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($ofertas as $oferta)
                <tr class="border-b border-gray-700">
                    <td class="px-3 py-2">
                        <a href="{{ route('ofertas.show', $oferta->id) }}" class="text-red-400 hover:underline">
                            {{ ucfirst($oferta->titulo) }}
                        </a>
                    </td>
                    <td class="px-3 py-2">{{ ucfirst($oferta->empresa->nombre) }}</td>
                    <td class="px-3 py-2">{{ Str::limit(ucfirst($oferta->descripcion), 50) }}</td>
                    <td class="px-3 py-2 space-x-1">
                        <a href="{{ route('ofertas.show', $oferta->id) }}" class="inline-block px-2 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">👁 Ver</a>

                        @role('empresa')
                            @if($oferta->empresa_id == auth()->user()->empresa_id)
                            <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta oferta?');">
                                @csrf @method('DELETE')
                                <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">🗑 Eliminar</button>
                            </form>
                            @endif
                        @endrole

                        @if(auth()->user()->hasRole('profesor') || auth()->user()->hasRole('admin'))
                        <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta oferta?');">
                            @csrf @method('DELETE')
                            <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">🗑 Eliminar</button>
                        </form>
                        @endif

                        @if(auth()->user()->hasRole('alumno'))
                            @php $yaInscrito = $oferta->alumnos->contains('id', auth()->user()->alumno_id); @endphp
                            @if($yaInscrito)
                            <form action="{{ route('ofertas.desinscribirse', $oferta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que quieres desinscribirte?');">
                                @csrf
                                <button class="px-2 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700">❌ Desinscribirse</button>
                            </form>
                            @else
                            <form action="{{ route('ofertas.apuntarse', $oferta->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">✅ Apuntarme</button>
                            </form>
                            @endif
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-3 py-4 text-center text-gray-400">😕 No hay ofertas disponibles</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
