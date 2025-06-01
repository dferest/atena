@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-6 text-red-400">Editar Empresa</h1>
    <form method="POST" action="{{ route('empresas.update', $empresa->id) }}" class="bg-gray-800 p-6 rounded shadow space-y-4">
        @csrf @method('PUT')

        @foreach (['nombre','email','telefono','direccion','ciudad','ceo'] as $campo)
        <div>
            <label class="block mb-1 capitalize">{{ ucfirst($campo) }}:</label>
            <input type="{{ $campo === 'email' ? 'email' : 'text' }}" name="{{ $campo }}" value="{{ old($campo, $empresa->$campo) }}"
                   class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500" required>
        </div>
        @endforeach

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 transition">Actualizar</button>
            <a href="{{ route('empresas.index') }}" class="px-4 py-2 rounded bg-gray-700 text-gray-100 hover:bg-gray-600 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
