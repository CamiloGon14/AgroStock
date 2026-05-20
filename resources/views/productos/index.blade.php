<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Inventario de Productos
            </h2>
            <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-amarillo-fuerte hover:bg-amarillo-oscuro text-gray-900 font-bold rounded-md shadow-sm transition-colors">
                + Nuevo Producto
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                                <th class="px-6 py-4 border-b font-bold">Nombre</th>
                                <th class="px-6 py-4 border-b font-bold">Precio</th>
                                <th class="px-6 py-4 border-b font-bold">Stock Inicial</th>
                                <th class="px-6 py-4 border-b font-bold">Stock Actual</th>
                                <th class="px-6 py-4 border-b font-bold text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach ($productos as $producto)
                                <tr class="hover:bg-gray-50 border-b border-gray-100 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $producto->nombre }}</td>
                                    <td class="px-6 py-4 text-gray-600">${{ number_format($producto->precio, 2) }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $producto->stock }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 rounded text-xs font-bold {{ $producto->stock_actual <= 0 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                            {{ $producto->stock_actual }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 flex justify-center space-x-3">
                                        <a href="{{ route('productos.edit', $producto) }}" class="text-amarillo-oscuro hover:text-gray-900 font-bold transition-colors">
                                            Editar
                                        </a>
                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if($productos->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        No hay productos registrados en el inventario.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>