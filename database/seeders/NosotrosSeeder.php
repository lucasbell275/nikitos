<?php

namespace Database\Seeders;

use App\Models\Nosotros;
use Illuminate\Database\Seeder;

class NosotrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nosotros::updateOrCreate(
            ['id' => 1],
            [
                'titulo' => '¿Quienes somos?',
                'subtitulo_1' => 'Nikitos se encuentra presente en el mercado local desde hace casi 40 años. ',
                'descripcion_1' => 'Actualmente cuenta con un amplio portfolio de productos de alimentos y bebidas , tales como Pizzitos, Palitos salados, Maikitos de Queso, Papas Fritas, Cereales, Pochoclos Acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar. El objetivo es llegar a los consumidores con ingredientes naturales y más saludables, contando con presencia de venta en todo el país y calidad de atención de excelencia.

Trabajamos junto a nuestros colaboradores enérgicamente en la producción y desarrollo de nuevos productos creados específicamente para satisfacer los gustos y tendencias de los consumidores, para llegar a ser la compañía local de alimentos y bebidas, que sobresale por su calidad.',
                'imagen_1' => 'images/nosotros/imagen_1.png',

                'subtitulo_2' => 'Nuestra planta modelo',
                'descripcion_2' => 'Con una vocación de reinversión permanente en tecnología de punta y de mejora continua en los procesos productivos, trabajamos para superar nuestros propios estándares de productividad, con operaciones industriales que se desarrollan bajo un Sistema de Gestión Integral (SGI) diseñado por y para Nikitos, que contempla las características propias de la empresa y las bases de las distintas herramientas para la gestión implementadas en el mercado. 
                Contamos con una Planta Industrial de 5500m2, en Buenos Aires, Argentina y otra en Montevideo, Uruguay.',
                'imagen_2' => 'images/nosotros/imagen_2.png',

                'subtitulo_3' => 'El equipo',
                'descripcion_3' => 'La integración sinérgica y creativa de los recursos y valores humanos representa el más importante capital en Nikitos. Nuestra filosofía corporativa es mantener un crecimiento sustentable al invertir en un futuro más saludable para la gente y para nuestro planeta.',
                'imagen_3' => 'images/nosotros/imagen_3.png',

                'subtitulo_4' => 'Nuestra flota',
                'descripcion_4' => 'Nuestro departamento de logística se especializa en realizar la distribución nacional de nuestros productos, contando con una Flota de Camiones, adecuados para su entrega en todo el territorio argentino.',
                'imagen_4' => 'images/nosotros/imagen_4.png',
            ]

        );
    }
}
