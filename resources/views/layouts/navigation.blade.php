<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm font-sans sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-black tracking-tighter text-gray-900 hover:text-amarillo-oscuro transition-colors">
                        AGROSTOCK
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex h-full">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 font-bold text-sm leading-5 transition duration-150 ease-in-out
                       {{ request()->routeIs('dashboard') ? 'border-amarillo-fuerte text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Panel de Control
                    </a>
                    
                    <a href="{{ route('productos.index') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 font-bold text-sm leading-5 transition duration-150 ease-in-out
                       {{ request()->routeIs('productos.*') ? 'border-amarillo-fuerte text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                        Productos
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-700 bg-white hover:text-amarillo-oscuro focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()?->name ?? 'Usuario' }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-start text-sm font-bold text-gray-700 hover:bg-yellow-50 hover:text-amarillo-oscuro transition-colors">
                            Mi Perfil
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-start text-sm font-bold text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors border-t border-gray-100">
                                Cerrar Sesión
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 font-bold text-base transition-colors {{ request()->routeIs('dashboard') ? 'border-amarillo-fuerte text-amarillo-oscuro bg-yellow-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }}">
                Panel de Control
            </a>
            <a href="{{ route('productos.index') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 font-bold text-base transition-colors {{ request()->routeIs('productos.*') ? 'border-amarillo-fuerte text-amarillo-oscuro bg-yellow-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300' }}">
                Productos
            </a>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-100 bg-gray-50">
            <div class="px-4">
                <div class="font-bold text-base text-gray-800">{{ Auth::user()?->name ?? 'Usuario' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()?->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-bold text-gray-600 hover:text-amarillo-oscuro hover:bg-yellow-50 hover:border-amarillo-fuerte transition-colors">
                    Mi Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-bold text-gray-600 hover:text-red-600 hover:bg-red-50 hover:border-red-500 transition-colors">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>