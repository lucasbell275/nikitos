<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catEscolar = Categorias::where('nombre_categoria', 'Tradicional Escolar')->first();
        $catJvMtlizada = Categorias::where('nombre_categoria', 'Juvenil Metalizada')->first();
        $catPremiumMax = Categorias::where('nombre_categoria', 'Premium Max 120g')->first();
        $catFrcnCristal = Categorias::where('nombre_categoria', 'Fraccionada Cristal')->first();
        $catFliaCristal = Categorias::where('nombre_categoria', 'Familiar Cristal')->first();
        Productos::create([
            'nombre' => 'Palitos Salados',
            'descripcion' => 'Palitos fritos de harina de trigo con un toque de sal.',
            'cajas' => '8',
            'unidades' => '20',
            'peso' => '20',
            'vida_util' => '16',
            'imagen' =>
            'images\productos\palitos_salados.png',
            'categoria_id' => $catEscolar->id,
        ]);

        Productos::create([
            'nombre'=>'Maikitos de Queso',
            'descripcion'=>'Maikitos de Queso',
            'cajas'=>'5',
            'unidades'=>'8',
            'peso'=>'30',
            'vida_util'=>'4',
            'imagen'=>'images\productos\maikitos.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Pizzitos de Jamon y Queso',
            'descripcion' => 'Pizzitos',
            'cajas' => '5',
            'unidades' => '8',
            'peso' => '40',
            'vida_util' => '5',
            'imagen' => 'images\productos\pizzitos.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Bolitas Dulces',
            'descripcion' => 'Bolitas',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '40',
            'vida_util' => '3',
            'imagen' => 'images\productos\bolitas_dulces.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Pochoclo Acaramelado',
            'descripcion' => 'Pochoclos',
            'cajas' => '4',
            'unidades' => '6',
            'peso' => '30',
            'vida_util' => '4',
            'imagen' => 'images\productos\pochoclos.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Papas Baston',
            'descripcion' => 'Papas',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '300',
            'vida_util' => '5',
            'imagen' => 'images\productos\papas_baston.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Cereal de Maiz',
            'descripcion' => 'Cereal',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '100',
            'vida_util' => '8',
            'imagen' => 'images\productos\cerealitos.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Girasol',
            'descripcion' => 'Girasoles',
            'cajas' => '4',
            'unidades' => '6',
            'peso' => '20',
            'vida_util' => '6',
            'imagen' => 'images\productos\girasol.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Cereal de Arroz',
            'descripcion' => 'Cereal',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '20',
            'vida_util' => '4',
            'imagen' => 'images\productos\maiz_inflado.png',
            'categoria_id' => $catEscolar->id,
        ]);
        Productos::create([
            'nombre' => 'Palitos de Queso',
            'descripcion' => 'Palitos',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '20',
            'vida_util' => '4',
            'imagen' => 'images\productos\palitos_salados.png',
            'categoria_id' => $catPremiumMax->id,
        ]);
        Productos::create([
            'nombre' => 'Papas Fritas Corte Clasico',
            'descripcion' => 'Papas',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '20',
            'vida_util' => '4',
            'imagen' => 'images\productos\palitos_salados.png',
            'categoria_id' => $catFrcnCristal->id,
        ]);
        Productos::create([
            'nombre' => 'Pizzitos de Jamon y Queso',
            'descripcion' => 'Cereal',
            'cajas' => '4',
            'unidades' => '8',
            'peso' => '20',
            'vida_util' => '4',
            'imagen' => 'images\productos\palitos_salados.png',
            'categoria_id' => $catFliaCristal->id,
        ]);
    }
}
