<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            'nombre' => 'Frutas',
        ]);

        Categoria::create([
            'nombre' => 'Verduras',
        ]);

        Categoria::create([
            'nombre' => 'Cereales',
        ]);
    }
}
