<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'id_unidad_peso',
        'cantidad_convertida_a_kg',
        'cantidad_ofertada',
        'precio_unitario',
    ];

    // Relación con Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación con Unidad de Peso
    public function unidadPeso()
    {
        return $this->belongsTo(UnidadPeso::class, 'id_unidad_peso');
    }

    // Relación con Carga
    public function cargas()
    {
        return $this->hasMany(Carga::class, 'id_pedido_detalle');
    }
}
