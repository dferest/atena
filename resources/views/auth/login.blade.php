@extends('layouts.auth')

@section('title', 'Acceso')

@section('content')
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

    <div>
        <label for="email" class="block mb-1">Email</label>
        <input id="email" name="email" type="email" required autofocus autocomplete="username"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('email') }}">
        <x-input-error :messages="$errors->get('email')" class="mt-1" />
    </div>

    <div>
        <label for="password" class="block mb-1">Contraseña</label>
        <input id="password" name="password" type="password" required autocomplete="current-password"
            class="w-full px-3 py-2 rounded bg-gray-900 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500">
        <x-input-error :messages="$errors->get('password')" class="mt-1" />
    </div>

    <div class="flex items-center justify-between">
        <label class="inline-flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-700 bg-gray-900 text-red-600 focus:ring-red-500">
            <span class="ml-2 text-sm">Recordarme</span>
        </label>
        <a href="{{ route('password.request') }}" class="text-sm text-red-400 hover:underline">¿Olvidaste tu contraseña?</a>
    </div>

    <div>
        <button type="submit" class="w-full px-5 py-2 bg-red-600 hover:bg-red-700 rounded text-white font-semibold transition">Entrar</button>
    </div>
</form>
@endsection