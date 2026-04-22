<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio'
    ];

    protected $casts = [
        'precio' => 'float',
        'stock' => 'integer'
    ];

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function getStockActualAttribute()
    {
        $entradas = $this->movimientos()
            ->where('tipo', 'entrada')
            ->sum('cantidad');

        $salidas = $this->movimientos()
            ->where('tipo', 'salida')
            ->sum('cantidad');

        return $entradas - $salidas;
    }
    
    public function getAlertaStockAttribute()
    {
        return $this->stock_actual <= $this->stock_minimo;
    }
}