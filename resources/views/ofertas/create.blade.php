@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold mb-6 text-red-400">🆕 Nueva Oferta de Prácticas</h1>
    <form method="POST" action="{{ route('ofertas.store') }}" class="bg-gray-800 p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Título</label>
            <input type="text" name="titulo" required class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block mb-1">Descripción</label>
            <textarea name="descripcion" rows="4" required class="w-full rounded bg-gray-900 border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500"></textarea>
        </div>
        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">💾 Guardar</button>
            <a href="{{ route('ofertas.index') }}" class="px-4 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
