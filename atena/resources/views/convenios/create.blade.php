@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-red-400 mb-6">Nuevo Convenio</h1>
    
    <form action="{{ route('convenios.store') }}" method="POST" class="bg-gray-900 p-6 rounded-xl shadow space-y-6">
        @csrf

        <div>
            <label class="block mb-2 text-gray-300">Número de Convenio</label>
            <input name="numero_convenio" required
                class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500">
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Empresa</label>
            <select name="empresa_id" required
                class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100">
                <option value="">– Selecciona –</option>
                @foreach($empresas as $e)
                    <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Profesor</label>
            <select name="profesor_id" required
                class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100">
                <option value="">– Selecciona –</option>
                @foreach($profesores as $p)
                    <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->ape1 }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Alumnos</label>
            <select name="alumnos[]" multiple
                class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100">
                @foreach($alumnos as $a)
                    <option value="{{ $a->id }}">{{ $a->nombre }} {{ $a->ape1 }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded font-semibold transition">Guardar</button>
            <a href="{{ route('convenios.index') }}" class="px-6 py-2 bg-gray-700 text-gray-100 rounded hover:bg-gray-600 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
