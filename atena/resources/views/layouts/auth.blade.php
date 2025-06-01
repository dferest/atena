<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title', 'Acceso')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-center items-center">
    <div class="w-full max-w-md p-8 bg-gray-800 rounded-lg shadow-lg">
        <div class="mb-8 text-center">
            <span class="text-3xl font-bold tracking-tight text-red-400">{{ config('app.name') }}</span>
        </div>
        @yield('content')
    </div>
</body>
</html>