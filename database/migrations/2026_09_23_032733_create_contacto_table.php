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
        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('razon_social')->nullable();
            $table->integer('cuit')->nullable();
            $table->string('tipo_negocio')->nullable();
            $table->string('trayectoria_mercado')->nullable();
            $table->string('direccion')->nullable();
            $table->string('localidad')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();
            $table->string('horario_atencion')->nullable();
            $table->string('email')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('nombre')->nullable();
            $table->string('genero')->nullable();
            $table->string('curriculum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
