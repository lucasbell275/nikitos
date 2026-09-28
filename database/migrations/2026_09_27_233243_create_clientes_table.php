<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table): void {
            $table->id();
            $table->string('username')->unique();
            $table->string('nombre');
            $table->string('razon_social');
            $table->string('codigo_cliente')->unique();
            $table->string('localidad');
            $table->string('horario')->nullable();
            $table->string('condiciones_pago');
            $table->string('email')->nullable();
            $table->string('password');
            $table->boolean('activo')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
