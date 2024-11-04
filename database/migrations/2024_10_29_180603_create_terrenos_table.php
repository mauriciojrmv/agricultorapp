<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrenos', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->foreignId('id_agricultor')->constrained('agricultors')->onDelete('cascade');
            $table->decimal('ubicacion_latitud', 10, 8);
            $table->decimal('ubicacion_longitud', 11, 8);
            $table->decimal('area', 10, 2);
            $table->decimal('superficie_total', 10, 2);
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('terrenos');
    }
}
