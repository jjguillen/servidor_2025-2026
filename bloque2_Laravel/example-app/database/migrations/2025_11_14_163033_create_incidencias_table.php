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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id()->primary();
            $table->double('latitud');
            $table->double('longitud');
            $table->string('ciudad',50);
            $table->string('direccion', 200);
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'en proceso', 'resuelta'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
