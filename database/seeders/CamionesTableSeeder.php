<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camion;

class CamionesTableSeeder extends Seeder
{
    public function run()
    {
        Camion::create(['id_conductor' => 1, 'capacidad' => 1000, 'capacidad_kg' => 1000, 'modelo' => 'Modelo A', 'placa' => 'ABC123', 'propietario' => 'Propietario A']);
        Camion::create(['id_conductor' => 2, 'capacidad' => 1200, 'capacidad_kg' => 1200, 'modelo' => 'Modelo B', 'placa' => 'DEF456', 'propietario' => 'Propietario B']);
        Camion::create(['id_conductor' => 3, 'capacidad' => 1500, 'capacidad_kg' => 1500, 'modelo' => 'Modelo C', 'placa' => 'GHI789', 'propietario' => 'Propietario C']);
    }
}
