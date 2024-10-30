<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'produccions';

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'id_terreno',
        'id_temporada',
        'id_producto',
        'cantidad_disponible',
        'fecha_recoleccion'
    ];

    // Relación con Terreno
    public function terreno()
    {
        return $this->belongsTo(Terreno::class, 'id_terreno');
    }

    // Relación con Temporada
    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'id_temporada');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación con Oferta, una producción puede tener múltiples ofertas
    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_produccion');
    }
}