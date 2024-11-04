<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_conductor',
        'capacidad',
        'capacidad_kg',
        'modelo',
        'placa',
        'propietario',
        'estado'
    ];

    // Relación con Conductor
    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'id_conductor');
    }
}
