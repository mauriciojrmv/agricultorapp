<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgricultorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agricultors', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('telefono', 20);
            $table->string('email', 100)->unique();
            $table->string('direccion', 255);
            $table->string('password', 255);
            $table->string('informacion_bancaria', 255)->nullable();
            $table->string('nit', 20)->unique();
            $table->string('carnet', 20);
            $table->string('licencia_funcionamiento', 255)->nullable();
            $table->string('estado', 50);
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
        Schema::dropIfExists('agricultors');
    }
}
