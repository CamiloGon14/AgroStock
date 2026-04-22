<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
   public function store(Request $request)
{
    $producto = Producto::find($request->producto_id);

    if ($request->tipo == 'salida' && $producto->stock_actual < $request->cantidad) {
        return back()->with('error', 'No hay suficiente stock');
    }

    Movimiento::create([
        'producto_id' => $request->producto_id,
        'tipo' => $request->tipo,
        'cantidad' => $request->cantidad
    ]);

    return redirect()->back()->with('success', 'Movimiento registrado');
}
}