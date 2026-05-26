<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Producto;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'inicio' => 'nullable|date',
            'fin' => 'nullable|date|after_or_equal:inicio',
        ]);

        $inicio = $request->inicio;
        $fin = $request->fin;

        $query = Movimiento::with('producto');

        if ($inicio && $fin) {
            $query->whereBetween('created_at', [$inicio, $fin]);
        }

        $movimientos = $query->get();

        $entradas = (clone $query)->where('tipo', 'entrada')->sum('cantidad');
        $salidas = (clone $query)->where('tipo', 'salida')->sum('cantidad');

        $stockTotal = Producto::sum('stock');

        $topProductos = Movimiento::selectRaw('producto_id, SUM(cantidad) as total')
            ->groupBy('producto_id')
            ->orderByDesc('total')
            ->with('producto')
            ->take(5)
            ->get();

        $movimientosPorDia = Movimiento::selectRaw('DATE(created_at) as fecha, SUM(cantidad) as total')
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return response()->json([
            'filtro' => [
                'inicio' => $inicio,
                'fin' => $fin
            ],
            'totales' => [
                'entradas' => $entradas,
                'salidas' => $salidas,
                'stock_total' => $stockTotal
            ],
            'top_productos' => $topProductos,
            'movimientos_por_dia' => $movimientosPorDia,
            'movimientos' => $movimientos
        ]);
    }
}