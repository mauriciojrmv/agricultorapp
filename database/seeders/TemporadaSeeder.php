<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temporada;

class TemporadaSeeder extends Seeder
{
    public function run()
    {
        Temporada::create([
            'nombre' => 'Temporada de Primavera',
        ]);

        Temporada::create([
            'nombre' => 'Temporada de Verano',
        ]);

        Temporada::create([
            'nombre' => 'Temporada de Otoño',
        ]);
    }
}
