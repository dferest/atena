@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <div class="bg-gray-800 p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4 text-red-400">Detalle de la Empresa</h1>
        <ul class="space-y-2 text-gray-100">
            @foreach(['nombre','email','telefono','direccion','ciudad','ceo'] as $campo)
            <li><span class="font-semibold capitalize">{{ ucfirst($campo) }}:</span> {{ $empresa->$campo }}</li>
            @endforeach
        </ul>
        <div class="flex space-x-2 mt-6">
            @if(
                (auth()->user()->hasRole('empresa') && auth()->user()->empresa_id == $empresa->id) ||
                auth()->user()->hasRole('admin')
            )
                <a href="{{ route('empresas.edit', $empresa->id) }}"
                class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
            @endif
            <a href="{{ route('empresas.index') }}"
            class="px-4 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600">Volver al listado</a>
        </div>
    </div>
</div>
@endsection