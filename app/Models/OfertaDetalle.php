<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_oferta',
        'id_producto',
        'cantidad_disponible',
        'precio_unitario',
        'fecha_disponible',
        'estado_detalle',
        'unidad_medida'
    ];

    // Relación inversa con Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta');
    }

    // Relación con Producto (cada detalle está asociado a un producto específico)
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
