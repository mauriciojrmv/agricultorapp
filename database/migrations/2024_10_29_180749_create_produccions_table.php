<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->foreignId('id_terreno')->constrained('terrenos')->onDelete('cascade'); // Clave foránea a 'terrenos'
            $table->foreignId('id_temporada')->constrained('temporadas')->onDelete('cascade'); // Clave foránea a 'temporadas'
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade'); // Clave foránea a 'productos'
            $table->decimal('cantidad_disponible', 10, 2);
            $table->date('fecha_recoleccion');
            $table->foreignId('id_unidad_peso')->constrained('unidad_pesos')->onDelete('cascade'); // Clave foránea a 'unidad_pesos'
            $table->decimal('cantidad_convertida_a_kg', 10, 2);
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
        Schema::dropIfExists('produccions');
    }
}
