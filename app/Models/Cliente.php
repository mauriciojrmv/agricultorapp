<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'password',
        'direccion',
        'ubicacion_latitud',
        'ubicacion_longitud'
    ];

    // Relación con Pedido, ya que un Cliente puede tener múltiples Pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
