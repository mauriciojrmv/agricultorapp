<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'Ana',
            'apellido' => 'Martínez',
            'telefono' => '111222333',
            'direccion' => 'Avenida 4',
            'ubicacion_latitud' => 12.345678,
            'ubicacion_longitud' => -76.543210,
            'email' => 'ana@example.com',
            'password' => bcrypt('password'),
        ]);

        Cliente::create([
            'nombre' => 'Pedro',
            'apellido' => 'Ramírez',
            'telefono' => '444555666',
            'direccion' => 'Avenida 5',
            'ubicacion_latitud' => 12.456789,
            'ubicacion_longitud' => -76.654321,
            'email' => 'pedro@example.com',
            'password' => bcrypt('password'),
        ]);

        Cliente::create([
            'nombre' => 'Sofía',
            'apellido' => 'Fernández',
            'telefono' => '777888999',
            'direccion' => 'Avenida 6',
            'ubicacion_latitud' => 12.567890,
            'ubicacion_longitud' => -76.765432,
            'email' => 'sofia@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
