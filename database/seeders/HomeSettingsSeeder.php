<?php

namespace Database\Seeders;

use App\Models\HomeSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;


class HomeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeSettings::updateOrCreate(
            ['id' => 1],
            [
            'titulo' => 'Nikitos Snacks',
            'descripcion' => 'Nikitos se encuentra presente en el mercado local desde hace casi 40 años.',
            'boton_descripcion_1_texto' => 'Descargar catalogo',
            'boton_descripcion_2_texto' => 'Ver productos',
            'elegir_video_imagen' => 'video',
            'video' => 'videos/home/lays_gourmet-header-video.mp4',
            'imagen' => 'images/home/imagen_nikitos.png',
            'nosotros_titulo' => 'Nosotros',
            'nosotros_descripcion' => 'Nikitos se encuentra presente en el mercado local desde hace casi 40 años. Actualmente cuenta con un amplio portfolio de productos de alimentos y bebidas , tales como Pizzitos, Palitos salados, Maikitos de Queso, Papas Fritas, Cereales, Pochoclos Acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar. El objetivo es llegar a los consumidores con ingredientes naturales y más saludables, contando con presencia de venta en todo el país y calidad de atención de excelencia.',
            'nosotros_boton_texto'=> 'Mas info',
            'mostrar_linea_productos' => true,
            'mostrar_productos_destacados' => true,
            'mostrar_recetas' =>true,
        ]);
    }
}
