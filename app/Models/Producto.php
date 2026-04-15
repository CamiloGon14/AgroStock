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
}