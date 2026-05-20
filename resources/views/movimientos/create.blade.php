<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Registrar Nuevo Movimiento
            </h2>
            <a href="{{ route('movimientos.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                &larr; Volver al historial
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('error'))
                <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-md font-bold text-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-8">
                
                <form method="POST" action="{{ route('movimientos.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="producto_id" class="block font-bold text-sm text-gray-700 mb-1">Producto <span class="text-red-500">*</span></label>
                        <select id="producto_id" name="producto_id" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all bg-white">
                            <option value="" disabled selected>Seleccione un producto del inventario...</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->nombre }} (Stock actual: {{ $producto->stock }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('producto_id')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="tipo" class="block font-bold text-sm text-gray-700 mb-1">Tipo de Movimiento <span class="text-red-500">*</span></label>
                            <select id="tipo" name="tipo" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all bg-white">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="entrada" {{ old('tipo') == 'entrada' ? 'selected' : '' }}>Entrada (+ Sumar stock)</option>
                                <option value="salida" {{ old('tipo') == 'salida' ? 'selected' : '' }}>Salida (- Restar stock)</option>
                                <option value="ajuste" {{ old('tipo') == 'ajuste' ? 'selected' : '' }}>Ajuste (+ Sumar stock por cuadre)</option>
                            </select>
                            <x-input-error :messages="$errors->get('tipo')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="cantidad" class="block font-bold text-sm text-gray-700 mb-1">Cantidad <span class="text-red-500">*</span></label>
                            <input id="cantidad" type="number" name="cantidad" value="{{ old('cantidad') }}" min="1" required 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" 
                                   placeholder="Ej: 10" />
                            <x-input-error :messages="$errors->get('cantidad')" class="mt-2 text-sm text-red-600" />
                        </div>
                    </div>

                    <div>
                        <label for="descripcion" class="block font-bold text-sm text-gray-700 mb-1">Motivo / Descripción (Opcional)</label>
                        <textarea id="descripcion" name="descripcion" rows="3" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all resize-none" 
                                  placeholder="Ej: Ingreso de mercancía del proveedor, Venta mostrador, Producto dañado..."></textarea>
                        <x-input-error :messages="$errors->get('descripcion')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('movimientos.index') }}" class="mr-4 text-sm font-bold text-gray-500 hover:text-gray-900 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-amarillo-fuerte border border-transparent rounded-md font-bold text-gray-900 uppercase tracking-widest hover:bg-amarillo-oscuro focus:bg-amarillo-oscuro active:bg-amarillo-oscuro focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5">
                            Guardar Movimiento
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>