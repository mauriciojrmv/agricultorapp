<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'id_cliente',
        'estado',
        'fecha_entrega',
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con PedidoDetalle
    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'id_pedido');
    }
}
