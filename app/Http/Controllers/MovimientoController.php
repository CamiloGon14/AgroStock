<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function index()
    {
        // Traemos los movimientos ordenados desde el más reciente
        $movimientos = Movimiento::with('producto')->latest()->get();
        
        // Lo enviamos a la vista visual (la tabla que acabamos de crear)
        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        // Traemos los productos para mostrarlos en el menú desplegable
        $productos = Producto::all();
        return view('movimientos.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
            'tipo'        => 'required|in:entrada,salida,ajuste',
            'descripcion' => 'nullable|string'
        ]);

        try {
            DB::transaction(function () use ($request) {
                $producto = Producto::findOrFail($request->producto_id);

                // Validar que haya stock suficiente para salidas
                if ($request->tipo == 'salida' && $producto->stock < $request->cantidad) {
                    throw new \Exception('No hay suficiente stock disponible para esta salida.');
                }

                // Actualizar el stock del producto
                if ($request->tipo == 'entrada' || $request->tipo == 'ajuste') {
                    $producto->stock += $request->cantidad;
                } else {
                    $producto->stock -= $request->cantidad;
                }
                
                $producto->save();

                // Registrar el historial del movimiento
                Movimiento::create([
                    'producto_id' => $request->producto_id,
                    'tipo'        => $request->tipo,
                    'cantidad'    => $request->cantidad,
                    'descripcion' => $request->descripcion,
                ]);
            });

            return redirect()->route('movimientos.index')->with('success', 'Movimiento registrado correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}