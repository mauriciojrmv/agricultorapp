<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terreno;

class TerrenoSeeder extends Seeder
{
    public function run()
    {
        Terreno::create([
            'id_agricultor' => 1,
            'descripcion' => 'Terreno de frutales',
            'ubicacion_latitud' => '12.345678', // Agrega un valor para latitud
            'ubicacion_longitud' => '-76.543210', // Agrega un valor para longitud
            'area' => 500.00, // Agrega un valor para el área
            'superficie_total' => 1000.00,
        ]);

        Terreno::create([
            'id_agricultor' => 2,
            'descripcion' => 'Terreno de hortalizas',
            'ubicacion_latitud' => '11.234567', // Agrega un valor para latitud
            'ubicacion_longitud' => '-75.123456', // Agrega un valor para longitud
            'area' => 300.00, // Agrega un valor para el área
            'superficie_total' => 1000.00,
        ]);

        Terreno::create([
            'id_agricultor' => 3,
            'descripcion' => 'Terreno de flores',
            'ubicacion_latitud' => '10.123456', // Agrega un valor para latitud
            'ubicacion_longitud' => '-74.654321', // Agrega un valor para longitud
            'area' => 250.00, // Agrega un valor para el área
            'superficie_total' => 1000.00,
        ]);
    }
}
