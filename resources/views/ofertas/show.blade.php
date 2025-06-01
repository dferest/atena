@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <div class="bg-gray-800 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-red-400">📄 {{ ucfirst($oferta->titulo) }}</h1>
        <div class="mb-2 text-gray-300"><span class="font-semibold">Empresa:</span> {{ ucfirst($oferta->empresa->nombre) }}</div>
        <div class="mb-4 text-gray-100"><span class="font-semibold">Descripción:</span> {{ ucfirst($oferta->descripcion) }}</div>
        <div class="mb-4">
            <span class="font-semibold text-gray-300">Alumnos inscritos:</span>
            <ul class="list-disc list-inside text-gray-100">
                @forelse($oferta->alumnos as $alumno)
                    @php
                        $pivot = $alumno->pivot;
                        $puedeVerObs = auth()->user()->hasAnyRole(['admin','profesor']) ||
                            (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $oferta->empresa_id);
                        $puedeEditarObs = auth()->user()->hasRole('profesor');
                    @endphp
                    <li>
                        {{ ucfirst($alumno->nombre) }} {{ ucfirst($alumno->ape1) }}
                        @if($puedeVerObs)
                        <div class="ml-4 text-xs text-gray-300">
                            <span class="font-semibold">Observaciones:</span>
                            @if($puedeEditarObs)
                            <form action="{{ route('ofertas.observaciones', [$oferta->id, $alumno->id]) }}" method="POST" class="inline">
                                @csrf
                                <input type="text" name="observaciones" value="{{ $pivot->observaciones }}" maxlength="100" class="bg-gray-700 text-white rounded px-2 py-1 text-xs w-48">
                                <button type="submit" class="px-2 py-1 bg-yellow-600 text-white rounded text-xs">Guardar</button>
                            </form>
                            @else
                            {{ $pivot->observaciones ?? '-' }}
                            @endif
                        </div>
                        @endif
                    </li>
                @empty
                <li class="text-gray-400">Ningún alumno inscrito</li>
                @endforelse
            </ul>
        </div>
        <div class="flex space-x-2 mt-6">
            @if(auth()->user()->hasRole('alumno'))
                @php $inscrito = $oferta->alumnos->contains(auth()->user()->alumno_id); @endphp
                @if(!$inscrito)
                <form action="{{ route('ofertas.apuntarse', $oferta->id) }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">✅ Apuntarme</button>
                </form>
                @else
                <form action="{{ route('ofertas.desinscribirse', $oferta->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres desinscribirte?');">
                    @csrf
                    <button class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">❌ Desinscribirse</button>
                </form>
                @endif
            @endif
            <a href="{{ route('ofertas.index') }}" class="px-4 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600">🔙 Volver</a>
        </div>
    </div>
</div>
@endsection
