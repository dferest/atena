@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold text-red-400 mb-6">Editar Convenio</h1>
    
    <form method="POST" action="{{ route('convenios.update', $convenio->id) }}" class="bg-gray-900 p-6 rounded-xl shadow space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 text-gray-300">Número de Convenio</label>
            <input type="text" name="numero_convenio" value="{{ old('numero_convenio', $convenio->numero_convenio) }}"
                class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100 focus:ring-2 focus:ring-red-500" required>
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Empresa</label>
            <select name="empresa_id" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100" required>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" @if($convenio->empresa_id == $empresa->id) selected @endif>
                        {{ $empresa->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Profesor</label>
            <select name="profesor_id" class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100" required>
                <option value="">– Sin profesor –</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" @if($convenio->profesor_id == $profesor->id) selected @endif>
                        {{ $profesor->nombre }} {{ $profesor->ape1 }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 text-gray-300">Alumnos</label>
            <select name="alumnos[]" multiple class="w-full px-3 py-2 rounded-md bg-gray-800 border border-gray-700 text-gray-100">
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" @if($convenio->alumnos->contains($alumno->id)) selected @endif>
                        {{ $alumno->nombre }} {{ $alumno->ape1 }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between mt-6">
            <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">Actualizar</button>
            <a href="{{ route('convenios.index') }}" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-gray-100 rounded transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
