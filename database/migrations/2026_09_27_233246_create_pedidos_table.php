<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->restrictOnDelete();
            $table->date('fecha');
            $table->string('razon_social');
            $table->string('codigo_cliente');
            $table->string('localidad');
            $table->string('horario');
            $table->string('condiciones_pago');
            $table->text('observaciones')->nullable();
            $table->string('archivo_path')->nullable();
            $table->string('estado')->default('recibido');
            $table->timestamps();
            $table->index(['cliente_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
