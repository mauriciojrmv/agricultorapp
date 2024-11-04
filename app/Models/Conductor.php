<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'carnet',
        'licencia_conducir',
        'fecha_nacimiento',
        'direccion',
        'email',
        'password',
        'ubicacion_latitud',
        'ubicacion_longitud',
        'estado'
    ];

    // Relación con Camiones
    public function camiones()
    {
        return $this->hasMany(Camion::class, 'id_conductor');
    }
}
