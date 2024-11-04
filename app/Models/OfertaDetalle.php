<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaDetalle extends Model
{
    use HasFactory;

    protected $table = 'oferta_detalles';

    protected $fillable = [
        'id_oferta',
        'id_producto',
        'cantidad_disponible',
        'precio_unitario',
        'fecha_disponible',
        'estado_detalle',
    ];

    // Relación con Oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class, 'id_oferta');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación con Carga
    public function cargas()
    {
        return $this->hasMany(Carga::class, 'id_oferta_detalle');
    }
}
