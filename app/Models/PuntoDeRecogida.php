<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoDeRecogida extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'id_ruta',
        'id_terreno',
        'id_carga',
        'id_producto',
        'cantidad_recoger',
        'orden',
        'estado',
    ];

    // Relación con Ruta
    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'id_ruta');
    }

    // Relación con Terreno
    public function terreno()
    {
        return $this->belongsTo(Terreno::class, 'id_terreno');
    }

    // Relación con Carga
    public function carga()
    {
        return $this->belongsTo(Carga::class, 'id_carga');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
