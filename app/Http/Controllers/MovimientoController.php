<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function store(Request $request)
{
    $movimiento = Movimiento::create($request->all());

    $producto = Producto::find($request->producto_id);

    if ($request->tipo == 'entrada') {
        $producto->stock += $request->cantidad;
    } elseif ($request->tipo == 'salida') {
        $producto->stock -= $request->cantidad;
    }

    $producto->save();

    return redirect()->back()->with('success', 'Movimiento registrado');
}
}
