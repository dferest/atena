@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10 p-6 rounded-2xl bg-zinc-900 shadow-xl text-white animate-fade-in">
    <h1 class="text-3xl font-extrabold mb-10 text-center text-fuchsia-400">✨ Panel de Control</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    
        @role('profesor')
            <x-dashboard-link route="alumnos.index" icon="🎓" label="Alumnos" />
            <x-dashboard-link route="empresas.index" icon="🏢" label="Empresas" />
            <x-dashboard-link route="convenios.index" icon="📄" label="Convenios" />
            <x-dashboard-link route="ofertas.index" icon="💼" label="Ofertas" />
        @endrole

        @role('alumno')
            <x-dashboard-link route="alumnos.index" icon="👤" label="Perfil" />
            <x-dashboard-link route="convenios.index" icon="📑" label="Mis convenios" />
            <x-dashboard-link route="ofertas.index" icon="🔍" label="Buscar Ofertas" />
        @endrole

        @role('empresa')
            <x-dashboard-link route="empresas.index" icon="🏢" label="Mi Empresa" />
            <x-dashboard-link route="convenios.index" icon="🤝" label="Convenios" />
            <x-dashboard-link route="ofertas.index" icon="📢" label="Mis Ofertas" />
        @endrole

        @role('admin')
            <x-dashboard-link route="profesores.index" icon="🧑‍🏫" label="Profesores" />
            <x-dashboard-link route="alumnos.index" icon="👩‍🎓" label="Alumnos" />
            <x-dashboard-link route="empresas.index" icon="🏭" label="Empresas" />
            <x-dashboard-link route="ofertas.index" icon="📦" label="Ofertas" />
            <x-dashboard-link route="convenios.index" icon="🗂️" label="Convenios" />
        @endrole
    </div>
</div>
@endsection