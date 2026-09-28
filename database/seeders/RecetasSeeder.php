<?php

namespace Database\Seeders;

use App\Models\Recetas;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $receta1 = Recetas::create([
            'titulo_receta' => 'Nachos de tacos en sarten',
            'tiempo_preparacion' => '5',
            'tiempo_coccion' => '15',
            'porciones' => '8',
            'imagen' => 'images/recetas/tacos.png',

        ]);

        $receta1->ingredientes()->createMany([
            ['ingrediente' => '1 bolsa de papas Papas fritas Nikitos clasicas'],
            ['ingrediente' => '1 cucharada de aceite vegetal o de canola'],
            ['ingrediente' => '450 g de carne de res molida'],
            ['ingrediente' => 'Aderezo para carne (30gr)'],
            ['ingrediente' => '2/3 taza de agua'],
            ['ingrediente' => '340g de queso cheddar rallado'],
            ['ingrediente' => 'Chiles jalape;os encurtidos'],
            ['ingrediente' => 'Cebollas encurtidas'],
            ['ingrediente' => 'Pico de gallo'],
            ['ingrediente' => 'Guacamole'],
            ['ingrediente' => 'Crema agria'],

        ]);

        $receta1->preparacion()->createMany([

            ['descripcion' => 'Precalienta el horno a 190°C'],

            ['descripcion' => 'Calienta el aceite en una sartén mediana a fuego medio-alto. Dora la carne molida hasta que esté completamente cocida. Agrega el aderezo para res y  el agua y cocina hasta que el agua se evapore y se espese hasta formaruna salsa.'],

            ['descripcion' => 'En una sartén grande de hierro fundido (u otra fuente para hornear) coloca las papas fritas, carne de ternera para tacos, la mitad del queso cheddar, las cebollas encurtida, los jalapeños encurtidos y la otra mitad de queso cheddar.'],

            ['descripcion' => 'Hornea durante 5 a 7 minutos, hasta que el queso burbujee y se derrita por completo.'],

            ['descripcion' => 'Sirve con crema agria, pico de gallo y guacamole.'],
        ]);


        $receta2 = Recetas::create([
            'titulo_receta' => 'Salteado crocante de brocoli y tofu',
            'tiempo_preparacion' => '5',
            'tiempo_coccion' => '15',
            'porciones' => '8',
            'imagen' => 'images/recetas/brocoli_frito.png',

        ]);
        $receta2->ingredientes()->createMany([
            ['ingrediente' => '1 bolsa de papas Papas fritas Nikitos clasicas'],
            ['ingrediente' => '1 cucharada de aceite vegetal o de canola'],
            ['ingrediente' => '450 g de carne de res molida'],
            ['ingrediente' => 'Aderezo para carne (30gr)'],
            ['ingrediente' => '2/3 taza de agua'],
            ['ingrediente' => '340g de queso cheddar rallado'],
            ['ingrediente' => 'Chiles jalape;os encurtidos'],
            ['ingrediente' => 'Cebollas encurtidas'],
            ['ingrediente' => 'Pico de gallo'],
            ['ingrediente' => 'Guacamole'],
            ['ingrediente' => 'Crema agria'],

        ]);
        $receta2->preparacion()->createMany([

            ['descripcion' => 'Precalienta el horno a 190°C'],

            ['descripcion' => 'Calienta el aceite en una sartén mediana a fuego medio-alto. Dora la carne molida hasta que esté completamente cocida. Agrega el aderezo para res y  el agua y cocina hasta que el agua se evapore y se espese hasta formaruna salsa.'],

            ['descripcion' => 'En una sartén grande de hierro fundido (u otra fuente para hornear) coloca las papas fritas, carne de ternera para tacos, la mitad del queso cheddar, las cebollas encurtida, los jalapeños encurtidos y la otra mitad de queso cheddar.'],

            ['descripcion' => 'Hornea durante 5 a 7 minutos, hasta que el queso burbujee y se derrita por completo.'],

            ['descripcion' => 'Sirve con crema agria, pico de gallo y guacamole.'],
        ]);

        $receta3 = Recetas::create([
            'titulo_receta' => 'Papas fritas onduladas cubiertas de chocolate',
            'tiempo_preparacion' => '5',
            'tiempo_coccion' => '15',
            'porciones' => '8',
            'imagen' => 'images/recetas/papas_chocolate.png',
        ]);
        $receta3->ingredientes()->createMany([
            ['ingrediente' => '1 bolsa de papas Papas fritas Nikitos clasicas'],
            ['ingrediente' => '1 cucharada de aceite vegetal o de canola'],
            ['ingrediente' => '450 g de carne de res molida'],
            ['ingrediente' => 'Aderezo para carne (30gr)'],
            ['ingrediente' => '2/3 taza de agua'],
            ['ingrediente' => '340g de queso cheddar rallado'],
            ['ingrediente' => 'Chiles jalape;os encurtidos'],
            ['ingrediente' => 'Cebollas encurtidas'],
            ['ingrediente' => 'Pico de gallo'],
            ['ingrediente' => 'Guacamole'],
            ['ingrediente' => 'Crema agria'],

        ]);
        $receta3->preparacion()->createMany([

            ['descripcion' => 'Precalienta el horno a 190°C'],

            ['descripcion' => 'Calienta el aceite en una sartén mediana a fuego medio-alto. Dora la carne molida hasta que esté completamente cocida. Agrega el aderezo para res y  el agua y cocina hasta que el agua se evapore y se espese hasta formaruna salsa.'],

            ['descripcion' => 'En una sartén grande de hierro fundido (u otra fuente para hornear) coloca las papas fritas, carne de ternera para tacos, la mitad del queso cheddar, las cebollas encurtida, los jalapeños encurtidos y la otra mitad de queso cheddar.'],

            ['descripcion' => 'Hornea durante 5 a 7 minutos, hasta que el queso burbujee y se derrita por completo.'],

            ['descripcion' => 'Sirve con crema agria, pico de gallo y guacamole.'],
        ]);
    }
}
