<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// TODAS ESTAS RUTAS ESTÁN PROTEGIDAS (Requieren iniciar sesión)
Route::middleware('auth')->group(function () {
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Módulos del Sistema (AQUÍ VAN SEGUROS)
    Route::resource('productos', ProductoController::class);
    Route::resource('movimientos', MovimientoController::class);
    Route::get('/reportes', [ReporteController::class, 'index']);
});

require __DIR__.'/auth.php';

// (Dejé estas preparadas para cuando configures roles más adelante)
Route::middleware(['role:admin'])->group(function () {
    // rutas admin
});

Route::middleware(['role:almacenista'])->group(function () {
    // rutas almacenista
});