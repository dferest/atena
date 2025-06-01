<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                @role('profesor|admin')
                    <x-nav-link :href="route('profesores.index')" :active="request()->routeIs('profesores.*')">
                        Profesores
                    </x-nav-link>
                    <x-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')">
                        Alumnos
                    </x-nav-link>
                    <x-nav-link :href="route('empresas.index')" :active="request()->routeIs('empresas.*')">
                        Empresas
                    </x-nav-link>
                    <x-nav-link :href="route('convenios.index')" :active="request()->routeIs('convenios.*')">
                        Convenios
                    </x-nav-link>
                    <x-nav-link :href="route('estadisticas')" :active="request()->routeIs('estadisticas')">
                        Estadísticas
                    </x-nav-link>
                @elserole('alumno')
                    <x-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')">
                        Alumnos
                    </x-nav-link>
                    <x-nav-link :href="route('convenios.index')" :active="request()->routeIs('convenios.*')">
                        Convenios
                    </x-nav-link>
                @elserole('empresa')
                    <x-nav-link :href="route('empresas.index')" :active="request()->routeIs('empresas.*')">
                        Empresas
                    </x-nav-link>
                    <x-nav-link :href="route('convenios.index')" :active="request()->routeIs('convenios.*')">
                        Convenios
                    </x-nav-link>
                @endrole
                @hasanyrole('empresa|alumno|profesor|admin')
                    <x-nav-link :href="route('ofertas.index')" :active="request()->routeIs('ofertas.*')">
                        Ofertas
                    </x-nav-link>
                @endhasanyrole
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
