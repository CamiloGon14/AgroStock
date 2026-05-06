<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\StockException;
class MovimientoController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'producto_id' => 'required|exists:productos,id',
                'cantidad' => 'required|integer|min:1',
                'tipo' => 'required|in:entrada,salida'
            ]);

            try {
                DB::transaction(function () use ($request) {

                    $producto = Producto::findOrFail($request->producto_id);

                    if ($request->tipo == 'salida' && $producto->stock_actual < $request->cantidad) {
                        throw new StockException('No hay suficiente stock');
                    }
                    if ($request->tipo == 'entrada') {
                        $producto->stock_actual += $request->cantidad;
                    } else {
                        $producto->stock_actual -= $request->cantidad;
                    }

                    $producto->save();
                    Movimiento::create([
                        'producto_id' => $request->producto_id,
                        'tipo' => $request->tipo,
                        'cantidad' => $request->cantidad,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                });
                return redirect()->back()->with('success', __('Movimiento registrado'));
            } catch (StockException $e) {
                return redirect()->back()->with('error', __('Error de stock: ') . $e->getMessage());
            } catch (\Exception $e) {
                return redirect()->back()->with('error', __('Error al registrar movimiento: ') . $e->getMessage());
            }
        }
}