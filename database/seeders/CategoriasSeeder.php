<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catEscolar = Categorias::create([
            'nombre_categoria' => 'Tradicional Escolar',
            'color' => '#F15199',
            'imagen' => 'images/categorias/linea_tradicional_escolar.png'
        ]);
        $catJvMtlizada= Categorias::create([
            'nombre_categoria' => 'Juvenil Metalizada',
            'color' => '#ED7477',
            'imagen' => 'images/categorias/linea_juvenil_metalizada1.png'
        ]);
        $catLineaMax= Categorias::create([
            'nombre_categoria' => 'Linea Max',
            'color' => '#DC6CFD',
            'imagen' => 'images/categorias/linea_max.png'
        ]);
        $catPremiumMax= Categorias::create([
            'nombre_categoria' => 'Premium Max 120g',
            'color' => '#1ACA87',
            'imagen' => 'images/categorias/linea_premium_max120grs.png'
        ]);
        $catPremiumMax2= Categorias::create([
            'nombre_categoria' => 'Premium Max 100g',
            'color' => '#EBAF59',
            'imagen' => 'images/categorias/linea_premium_max100grs.png'
        ]);
        $catFrcnCristal= Categorias::create([
            'nombre_categoria' => 'Fraccionada Cristal',
            'color' => '#B999FD',
            'imagen' => 'images/categorias/linea_fraccionada_cristal40grs.png'
        ]);
        $catFliaTrad= Categorias::create([
            'nombre_categoria' => 'Familiar Tradicional',
            'color' => '#DC6CFD',
            'imagen' => 'images/categorias/linea_familiar_tradicional.png'
        ]);
        $catFliaCristal= Categorias::create([
            'nombre_categoria' => 'Familiar Cristal',
            'color' => '#1ACA87',
            'imagen' => 'images/categorias/linea_familiar_cristal.png'
        ]);
        $catGrnSlt= Categorias::create([
            'nombre_categoria' => 'Granel/Suelta',
            'color' => '#EBAF59',
            'imagen' => 'images/categorias/linea_granel_suelta1kg.png'
        ]);
        $catSnacksNikitos= Categorias::create([
            'nombre_categoria' => 'Combo Snacks Nikitos',
            'color' => '#18A1AD',
            'imagen' => 'images/categorias/linea_juvenil_metalizada2.png'
        ]);
        $catJugos= Categorias::create([
            'nombre_categoria' => 'Jugos',
            'color' => '#FD494D',
            'imagen' => 'images/categorias/linea_juvenil_metalizada2.png'
        ]);

    }
}
