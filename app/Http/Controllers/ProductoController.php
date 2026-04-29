<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
public function index() {
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
}

public function create() {
    return view('productos.create');
}

public function store(Request $request) {
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'descripcion' => 'nullable|string',
    ]);
    Producto::create($validatedData);
    return redirect()->route('productos.index');
}

public function edit(Producto $producto) {
    return view('productos.edit', compact('producto'));
}

public function update(Request $request, Producto $producto) {
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'descripcion' => 'nullable|string',
    ]);

    $producto->update($validatedData);
    return redirect()->route('productos.index');
}

public function destroy(Producto $producto) {
    $producto->delete();
    return redirect()->route('productos.index');
}
}