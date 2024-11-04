<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camions', function (Blueprint $table) {
            $table->id(); // Clave primaria 'id' (BIGINT UNSIGNED)
            $table->foreignId('id_conductor')->constrained('conductors')->onDelete('cascade'); // Referencia a la tabla 'conductores'
            $table->decimal('capacidad', 10, 2);
            $table->decimal('capacidad_kg', 10, 2);
            $table->string('modelo', 100);
            $table->string('placa', 20)->unique();
            $table->string('propietario', 100);
            $table->string('estado', 50)->default('disponible'); // Valor por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camiones');
    }
}

