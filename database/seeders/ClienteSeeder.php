<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Productos;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::firstOrCreate(
            ['username' => 'cliente'],
            [
                'nombre' => 'Cliente de prueba',
                'razon_social' => 'Cliente Nikitos',
                'codigo_cliente' => 'CLI-001',
                'localidad' => 'Merlo',
                'horario' => '9:00 a 17:00',
                'condiciones_pago' => 'Cuenta corriente',
                'email' => null,
                'password' => 'cliente123',
                'activo' => true,
            ]
        );

        Productos::query()->whereNull('codigo')->orderBy('id')->get()->each(function (Productos $producto): void {
            $producto->update([
                'codigo' => 'NK-'.str_pad((string) $producto->id, 4, '0', STR_PAD_LEFT),
            ]);
        });
    }
}
