<?php

namespace Database\Factories;

use App\Models\ListaPrecio;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ListaPrecio> */
class ListaPrecioFactory extends Factory
{
    protected $model = ListaPrecio::class;

    public function definition(): array
    {
        return [
            'titulo' => 'Lista de precios - '.fake()->monthName().' '.fake()->year(),
            'archivo_path' => 'listas-precios/'.fake()->uuid().'.pdf',
            'tamano_bytes' => fake()->numberBetween(50000, 2000000),
        ];
    }
}
