@extends('layouts.auth')

@section('title', 'Registro')

@section('content')
<form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    <div>
        <label for="name" class="block mb-1">Nombre</label>
        <input id="name" name="name" type="text" required autofocus autocomplete="name"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('name') }}">
        <x-input-error :messages="$errors->get('name')" class="mt-1" />
    </div>

    <div>
        <label for="email" class="block mb-1">Email</label>
        <input id="email" name="email" type="email" required autocomplete="username"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('email') }}">
        <x-input-error :messages="$errors->get('email')" class="mt-1" />
    </div>

    <div>
        <label for="password" class="block mb-1">Contraseña</label>
        <input id="password" name="password" type="password" required autocomplete="new-password"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
        <x-input-error :messages="$errors->get('password')" class="mt-1" />
    </div>

    <div>
        <label for="password_confirmation" class="block mb-1">Repite Contraseña</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
    </div>

    <div class="flex items-center justify-between">
        <a href="{{ route('login') }}" class="text-sm text-red-400 hover:underline">¿Ya tienes cuenta?</a>
        <button type="submit" class="px-5 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">Registrarse</button>
    </div>
</form>
@endsection