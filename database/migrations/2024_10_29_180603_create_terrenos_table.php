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
        Schema::create('terrenos', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->foreignId('id_agricultor')->constrained('agricultors')->onDelete('cascade');
            $table->decimal('ubicacion_latitud', 10, 8);
            $table->decimal('ubicacion_longitud', 11, 8);
            $table->decimal('area', 10, 2);
            $table->decimal('superficie_total', 10, 2);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrenos');
    }
};
