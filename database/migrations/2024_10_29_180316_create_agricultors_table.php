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
        Schema::create('agricultors', function (Blueprint $table) {
            $table->id(); // Usa "id" como clave primaria por convención
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 100)->unique();
            $table->string('telefono', 20);
            $table->string('informacion_bancaria', 255);
            $table->string('nit', 20);
            $table->string('carnet', 20);
            $table->string('licencia_funcionamiento', 100);
            $table->string('estado', 50);
            $table->string('direccion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultors');
    }
};
