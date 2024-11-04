<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terreno;

class TerrenoSeeder extends Seeder
{
    public function run()
    {
        Terreno::create(['id_agricultor' => 1, 'ubicacion_latitud' => 12.345678, 'ubicacion_longitud' => -76.543210, 'area' => 500, 'superficie_total' => 1000, 'descripcion' => 'Terreno de frutales']);
        Terreno::create(['id_agricultor' => 1, 'ubicacion_latitud' => 12.456789, 'ubicacion_longitud' => -76.654321, 'area' => 600, 'superficie_total' => 1200, 'descripcion' => 'Terreno de hortalizas']);
        Terreno::create(['id_agricultor' => 2, 'ubicacion_latitud' => 12.567890, 'ubicacion_longitud' => -76.765432, 'area' => 700, 'superficie_total' => 1400, 'descripcion' => 'Terreno de granos']);
    }
}
