<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    use HasFactory;

    protected $table = 'carga'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'id_pedido_detalle',
        'id_oferta_detalle',
        'cantidad_asignada',
        'estado_asignacion',
    ];

    // Relación con PedidoDetalle
    public function pedidoDetalle()
    {
        return $this->belongsTo(PedidoDetalle::class, 'id_pedido_detalle');
    }

    // Relación con OfertaDetalle
    public function ofertaDetalle()
    {
        return $this->belongsTo(OfertaDetalle::class, 'id_oferta_detalle');
    }

    // Relación con Puntos de Recogida: una carga puede estar asociada a varios puntos de recogida
    public function puntoDeRecogida()
    {
        return $this->hasMany(PuntoDeRecogida::class, 'id_carga');
    }
}
