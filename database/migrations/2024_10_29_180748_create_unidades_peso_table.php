<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesPesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_pesos', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->string('nombre', 50)->unique(); // Nombre de la unidad de peso
            $table->decimal('factor_conversion_a_kg', 10, 4); // Factor de conversión a kilogramos
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
        Schema::dropIfExists('unidad_pesos');
    }
}
