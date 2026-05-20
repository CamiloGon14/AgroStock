<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                Historial de Movimientos
            </h2>
            <a href="{{ route('movimientos.create') }}" class="px-4 py-2 bg-amarillo-fuerte text-gray-900 font-bold rounded-md hover:bg-amarillo-oscuro transition-colors text-sm shadow-sm">
                + Nuevo Movimiento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-md font-bold text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-50 border-b border-gray-100 font-bold">
                            <tr>
                                <th class="px-6 py-4">Fecha</th>
                                <th class="px-6 py-4">Producto</th>
                                <th class="px-6 py-4">Tipo</th>
                                <th class="px-6 py-4 text-center">Cantidad</th>
                                <th class="px-6 py-4">Motivo / Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($movimientos as $movimiento)
                                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 font-medium">
                                        {{ $movimiento->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">
                                        {{ $movimiento->producto->nombre ?? 'Producto Eliminado' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($movimiento->tipo == 'entrada')
                                            <span class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-xs font-bold border border-green-100">ENTRADA</span>
                                        @elseif($movimiento->tipo == 'salida')
                                            <span class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-xs font-bold border border-red-100">SALIDA</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-bold border border-gray-200">AJUSTE</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center font-black text-gray-900">
                                        {{ $movimiento->tipo == 'salida' ? '-' : '+' }}{{ $movimiento->cantidad }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 italic">
                                        {{ $movimiento->descripcion ?? 'Sin descripción' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 font-medium">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        No hay movimientos registrados en el historial.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>