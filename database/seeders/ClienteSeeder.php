<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
            'password' => bcrypt('password123'), // Asegúrate de usar bcrypt para encriptar la contraseña
            'direccion' => 'Calle Principal 123',
            'ubicacion_latitud' => 12.345678,
            'ubicacion_longitud' => -76.543210
        ]);

        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'Gómez',
            'email' => 'maria.gomez@example.com',
            'telefono' => '987654321',
            'password' => bcrypt('securepass456'),
            'direccion' => 'Av. Secundaria 456',
            'ubicacion_latitud' => 12.987654,
            'ubicacion_longitud' => -76.123456
        ]);

        Cliente::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            'email' => 'carlos.lopez@example.com',
            'telefono' => '456123789',
            'password' => bcrypt('mypassword789'),
            'direccion' => 'Calle Tercera 789',
            'ubicacion_latitud' => 13.654321,
            'ubicacion_longitud' => -75.987654
        ]);
    }
}
