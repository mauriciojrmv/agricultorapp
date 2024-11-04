<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agricultor;

class AgricultorSeeder extends Seeder
{
    public function run()
    {
        Agricultor::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'telefono' => '123456789',
            'email' => 'juan@example.com',
            'direccion' => 'Calle 1',
            'password' => bcrypt('password'),
            'informacion_bancaria' => 'Banco XYZ',
            'nit' => '123456789',
            'carnet' => 'AB123456',
            'licencia_funcionamiento' => 'Licencia 1',
            'estado' => 'activo',
        ]);

        Agricultor::create([
            'nombre' => 'Maria',
            'apellido' => 'Gómez',
            'telefono' => '987654321',
            'email' => 'maria@example.com',
            'direccion' => 'Calle 2',
            'password' => bcrypt('password'),
            'informacion_bancaria' => 'Banco ABC',
            'nit' => '987654321',
            'carnet' => 'CD987654',
            'licencia_funcionamiento' => 'Licencia 2',
            'estado' => 'activo',
        ]);

        Agricultor::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'telefono' => '456789123',
            'email' => 'carlos@example.com',
            'direccion' => 'Calle 3',
            'password' => bcrypt('password'),
            'informacion_bancaria' => 'Banco DEF',
            'nit' => '456789123',
            'carnet' => 'EF456789',
            'licencia_funcionamiento' => 'Licencia 3',
            'estado' => 'activo',
        ]);
    }
}
