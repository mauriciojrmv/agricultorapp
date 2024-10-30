<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'estado', 'fecha_entrega'];

    // Relación con PedidoDetalle
    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'id_pedido');
    }

    // Relación con Cliente (un pedido pertenece a un cliente)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
