<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temporada;

class TemporadaSeeder extends Seeder
{
    public function run()
    {
        Temporada::create([
            'nombre' => 'Primavera',
            'fecha_inicio' => '2024-03-21',
            'fecha_fin' => '2024-06-20',
            'descripcion' => 'Temporada de crecimiento para muchas plantas y flores.'
        ]);

        Temporada::create([
            'nombre' => 'Verano',
            'fecha_inicio' => '2024-06-21',
            'fecha_fin' => '2024-09-22',
            'descripcion' => 'Temporada calurosa, ideal para cultivos de verano.'
        ]);

        Temporada::create([
            'nombre' => 'Otoño',
            'fecha_inicio' => '2024-09-23',
            'fecha_fin' => '2024-12-20',
            'descripcion' => 'Temporada de cosecha para muchos cultivos.'
        ]);
    }
}
