<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            Panel de Control
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 mb-8">
                <div class="p-8 text-gray-900 flex flex-col md:flex-row items-start md:items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-black tracking-tight mb-2">¡Bienvenido al sistema, {{ Auth::user()?->name ?? 'Usuario' }}!</h3>
                        <p class="text-lg text-gray-500">Sistema centralizado para la administración, trazabilidad y control de insumos en tiempo real.</p>
                    </div>
                    <div class="mt-4 md:mt-0 hidden sm:block">
                        <div class="w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center border-2 border-amarillo-fuerte text-gray-900 shadow-sm">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:border-amarillo-fuerte hover:shadow-md transition-all group">
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Gestión Central</div>
                    <div class="text-3xl font-black text-gray-900 mb-4 group-hover:text-amarillo-oscuro transition-colors">Inventario</div>
                    <p class="text-gray-600 mb-6 line-clamp-2">Administre entradas, salidas y verifique el stock actual de insumos.</p>
                    <a href="{{ route('productos.index') }}" class="inline-flex items-center text-amarillo-oscuro hover:text-gray-900 font-bold transition-colors">
                        Ver todos los productos 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:border-amarillo-fuerte hover:shadow-md transition-all group">
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Acceso Rápido</div>
                    <div class="text-3xl font-black text-gray-900 mb-4 group-hover:text-amarillo-oscuro transition-colors">Registrar</div>
                    <p class="text-gray-600 mb-6 line-clamp-2">Añada un nuevo producto o insumo a la base de datos central.</p>
                    <a href="{{ route('productos.create') }}" class="inline-flex items-center text-amarillo-oscuro hover:text-gray-900 font-bold transition-colors">
                        Crear nuevo producto
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 hover:border-amarillo-fuerte hover:shadow-md transition-all group">
                    <div class="text-gray-500 text-sm font-bold uppercase tracking-wider mb-2">Configuración</div>
                    <div class="text-3xl font-black text-gray-900 mb-4 group-hover:text-amarillo-oscuro transition-colors">Mi Cuenta</div>
                    <p class="text-gray-600 mb-6 line-clamp-2">Actualice sus datos personales, correo o cambie su contraseña.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-amarillo-oscuro hover:text-gray-900 font-bold transition-colors">
                        Actualizar datos
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>