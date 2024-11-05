<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadPeso extends Model
{
    use HasFactory;

    protected $table = 'unidad_pesos';

    protected $fillable = [
        'nombre',
        'factor_conversion_a_kg'
    ];

    // Relación con Produccions (si es necesario)
    public function produccions()
    {
        return $this->hasMany(Produccion::class, 'id_unidad_peso');
    }

    // Relación con Ofertas (si es necesario)
    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_unidad_peso');
    }

    // Relación con PedidoDetalles (si es necesario)
    public function pedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'id_unidad_peso');
    }
}
