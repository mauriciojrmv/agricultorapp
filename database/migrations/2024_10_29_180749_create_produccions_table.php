<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produccions', function (Blueprint $table) {
            $table->id(); // Clave primaria de 'produccions'
            $table->foreignId('id_terreno')->constrained('terrenos')->onDelete('cascade');
            $table->foreignId('id_temporada')->constrained('temporadas')->onDelete('cascade'); // Clave foránea a 'temporadas'
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade');
            $table->decimal('cantidad_disponible', 10, 2);
            $table->date('fecha_recoleccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccions');
    }
};
