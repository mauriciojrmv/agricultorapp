<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terreno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agricultor',
        'ubicacion_latitud',
        'ubicacion_longitud',
        'area',
        'superficie_total',
        'descripcion'
    ];

    // Relación con Agricultor, cada terreno pertenece a un agricultor
    public function agricultor()
    {
        return $this->belongsTo(Agricultor::class, 'id_agricultor');
    }

    // Relación con Producción, un terreno puede tener muchas producciones
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'id_terreno');
    }
}
