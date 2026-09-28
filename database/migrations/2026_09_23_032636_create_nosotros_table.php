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
        Schema::create('nosotros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo')->nullable();
            $table->string('subtitulo_1')->nullable();
            $table->text('descripcion_1')->nullable();
            $table->string('imagen_1')->nullable();

            $table->string('subtitulo_2')->nullable();
            $table->text('descripcion_2')->nullable();
            $table->string('imagen_2')->nullable();

            $table->string('subtitulo_3')->nullable();
            $table->text('descripcion_3')->nullable();
            $table->string('imagen_3')->nullable();

            $table->string('subtitulo_4')->nullable();
            $table->text('descripcion_4')->nullable();
            $table->string('imagen_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nosotros');
    }
};
