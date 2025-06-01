@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-8 px-4">
    <div class="bg-gray-900 p-6 rounded-xl shadow text-gray-100">
        <h1 class="text-3xl font-bold text-red-400 mb-4">Convenio Nº {{ $convenio->numero_convenio }}</h1>

        <ul class="space-y-2 text-gray-200">
            <li><span class="font-semibold text-gray-300">Empresa:</span> {{ $convenio->empresa->nombre ?? '-' }}</li>
            <li><span class="font-semibold text-gray-300">Profesor:</span> 
                {{ $convenio->profesor ? $convenio->profesor->nombre . ' ' . $convenio->profesor->ape1 : '-' }}
            </li>
            <li>
                <span class="font-semibold text-gray-300">Alumnos:</span>
                @if($convenio->alumnos->count())
                    <ul class="list-disc list-inside pl-4">
                        @foreach($convenio->alumnos as $alumno)
                            <li>{{ $alumno->nombre }} {{ $alumno->ape1 }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>-</span>
                @endif
            </li>
        </ul>

        <div class="flex flex-wrap gap-4 mt-6">
            <a href="{{ route('convenios.pdf', $convenio->id) }}"
               class="px-5 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">Descargar PDF</a>

            <a href="{{ route('convenios.edit', $convenio->id) }}"
               class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 rounded text-white font-semibold transition">Editar</a>

            <a href="{{ route('convenios.index') }}"
               class="px-5 py-2 bg-gray-700 hover:bg-gray-600 rounded text-gray-100 transition">Volver al listado</a>
        </div>
    </div>

    @if(auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $convenio->empresa_id && !$convenio->cerrado)
        <form action="{{ route('convenios.cerrar', $convenio->id) }}" method="POST" class="mt-4 space-y-2">
            @csrf
            <label class="block text-gray-300">Comentario de cierre (opcional, máx 1000 caracteres):</label>
            <textarea name="comentario_cierre" maxlength="1000" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100"></textarea>
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Cerrar convenio</button>
        </form>
    @endif

    @if($convenio->cerrado)
        <div class="mt-4 p-4 bg-yellow-100 text-yellow-800 rounded">
            <strong>Convenio cerrado</strong>
            @if($convenio->comentario_cierre)
                <div class="mt-2"><strong>Comentario:</strong> {{ $convenio->comentario_cierre }}</div>
            @endif
            <div class="mt-1 text-xs text-gray-500">Cerrado el {{ $convenio->cerrado_at ? $convenio->cerrado_at->format('d/m/Y H:i') : '' }}</div>
        </div>
    @endif
</div>
@endsection
