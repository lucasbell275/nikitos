<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedido_items', function (Blueprint $table): void {
            $table->dropColumn('precio_unitario');
        });

        Schema::table('productos', function (Blueprint $table): void {
            $table->dropColumn('precio');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table): void {
            $table->decimal('precio', 12, 2)->nullable();
        });

        Schema::table('pedido_items', function (Blueprint $table): void {
            $table->decimal('precio_unitario', 12, 2)->nullable();
        });
    }
};
