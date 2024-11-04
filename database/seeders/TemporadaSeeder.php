<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temporada;

class TemporadaSeeder extends Seeder
{
    public function run()
    {
        Temporada::create(['nombre' => 'Primavera', 'fecha_inicio' => '2024-03-01', 'fecha_fin' => '2024-05-31', 'descripcion' => 'Temporada de cultivo de primavera']);
        Temporada::create(['nombre' => 'Verano', 'fecha_inicio' => '2024-06-01', 'fecha_fin' => '2024-08-31', 'descripcion' => 'Temporada de cultivo de verano']);
        Temporada::create(['nombre' => 'Otoño', 'fecha_inicio' => '2024-09-01', 'fecha_fin' => '2024-11-30', 'descripcion' => 'Temporada de cultivo de otoño']);
    }
}

