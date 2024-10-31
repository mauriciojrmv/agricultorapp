<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Terreno;

class TerrenoSeeder extends Seeder
{
    public function run()
    {
        Terreno::create([
            'id_agricultor' => 1, // Juan Pérez
            'descripcion' => 'Terreno de frutales',
        ]);

        Terreno::create([
            'id_agricultor' => 2, // Ana Gómez
            'descripcion' => 'Terreno de hortalizas',
        ]);

        Terreno::create([
            'id_agricultor' => 3, // Luis Martínez
            'descripcion' => 'Terreno de cereales',
        ]);
    }
}
