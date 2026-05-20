<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            Editar Producto: <span class="text-gray-500">{{ $producto->nombre }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 p-8">
                
                <form action="{{ route('productos.update', $producto) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nombre" class="block text-sm font-bold text-gray-700 mb-1">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all">
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="precio" class="block text-sm font-bold text-gray-700 mb-1">Precio Unitario</label>
                            <input type="number" step="0.01" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all">
                            <x-input-error :messages="$errors->get('precio')" class="mt-2 text-red-600 text-sm" />
                        </div>
                        
                        <div>
                            <label for="stock" class="block text-sm font-bold text-gray-700 mb-1">Stock Inicial</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all">
                            <x-input-error :messages="$errors->get('stock')" class="mt-2 text-red-600 text-sm" />
                        </div>
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-bold text-gray-700 mb-1">Descripción (Opcional)</label>
                        <textarea name="descripcion" id="descripcion" rows="4" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2 text-red-600 text-sm" />
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('productos.index') }}" class="text-sm font-bold text-gray-600 hover:text-gray-900 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2 bg-amarillo-fuerte hover:bg-amarillo-oscuro text-gray-900 font-bold rounded-md shadow-sm transition-all transform hover:-translate-y-0.5">
                            Actualizar Producto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>