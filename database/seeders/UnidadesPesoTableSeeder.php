<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadPeso;

class UnidadesPesoTableSeeder extends Seeder
{
    public function run()
    {
        UnidadPeso::create(['nombre' => 'Kilogramo', 'factor_conversion_a_kg' => 1]);
        UnidadPeso::create(['nombre' => 'Gramo', 'factor_conversion_a_kg' => 0.001]);
        UnidadPeso::create(['nombre' => 'Tonelada', 'factor_conversion_a_kg' => 1000]);
    }
}
