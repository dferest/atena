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
</div>
@endsection
