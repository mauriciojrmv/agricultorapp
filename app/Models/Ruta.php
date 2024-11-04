<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'id_camion',
        'fecha_recogida',
        'capacidad_utilizada',
        'distancia_total',
        'estado',
    ];

    // Relación con Camión
    public function camion()
    {
        return $this->belongsTo(Camion::class, 'id_camion');
    }

    // Relación con Puntos de Recogida
    public function puntosDeRecogida()
    {
        return $this->hasMany(PuntoDeRecogida::class, 'id_ruta');
    }
}
