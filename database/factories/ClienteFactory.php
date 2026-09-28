<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Cliente> */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'nombre' => fake()->name(),
            'razon_social' => fake()->company(),
            'codigo_cliente' => fake()->unique()->numerify('CLI-#####'),
            'localidad' => fake()->city(),
            'horario' => '9:00 a 17:00',
            'condiciones_pago' => 'Cuenta corriente',
            'email' => fake()->safeEmail(),
            'password' => 'clientecliente',
            'activo' => true,
        ];
    }
}
