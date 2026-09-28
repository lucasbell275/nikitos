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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('boton_descripcion_1_texto')->nullable();
            $table->string('boton_descripcion_1_redireccion')->nullable();
            $table->string('boton_descripcion_2_texto')->nullable();
            $table->string('boton_descripcion_2_redireccion')->nullable();
            $table->string('elegir_video_imagen')->nullable()->default('video');
            $table->string('video')->nullable();
            $table->string('imagen')->nullable();
            $table->string('nosotros_titulo')->nullable();
            $table->text('nosotros_descripcion')->nullable();
            $table->string('nosotros_boton_redireccion')->nullable();
            $table->string('nosotros_boton_texto')->nullable();
            $table->boolean('mostrar_linea_productos')->nullable();
            $table->boolean('mostrar_productos_destacados')->nullable();
            $table->boolean('mostrar_recetas')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home');
    }
};
