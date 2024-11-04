<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 20);
            $table->string('carnet', 20);
            $table->string('licencia_conducir', 50)->unique(); // Licencia única
            $table->date('fecha_nacimiento'); // Fecha de nacimiento
            $table->string('direccion', 255);
            $table->string('email', 100)->unique(); // Email único
            $table->string('password', 255);
            $table->decimal('ubicacion_latitud', 10, 8)->nullable();
            $table->decimal('ubicacion_longitud', 11, 8)->nullable();
            $table->string('estado', 50)->default('activo'); // Estado por defecto 'activo'
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductores');
    }
}
