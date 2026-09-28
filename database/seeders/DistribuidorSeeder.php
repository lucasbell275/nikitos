<?php

namespace Database\Seeders;

use App\Models\Distribuidor;
use Illuminate\Database\Seeder;

class DistribuidorSeeder extends Seeder
{
    public function run(): void
    {
        $distribuidores = [
            ['nombre' => 'Distribuidor de prueba - La Plata', 'provincia' => 'Buenos Aires', 'ciudad' => 'La Plata', 'direccion' => 'Plaza Moreno, Calle 12 y 51', 'latitud' => -34.92135, 'longitud' => -57.95451],
            ['nombre' => 'Distribuidor de prueba - Mar del Plata', 'provincia' => 'Buenos Aires', 'ciudad' => 'Mar del Plata', 'direccion' => 'Plaza Colón, Av. Colón y Buenos Aires', 'latitud' => -38.00545, 'longitud' => -57.54268],
            ['nombre' => 'Distribuidor de prueba - CABA', 'provincia' => 'Ciudad Autónoma de Buenos Aires', 'ciudad' => 'Buenos Aires', 'direccion' => 'Balcarce 50', 'latitud' => -34.60817, 'longitud' => -58.37027],
            ['nombre' => 'Distribuidor de prueba - Rosario', 'provincia' => 'Santa Fe', 'ciudad' => 'Rosario', 'direccion' => 'Santa Fe 581', 'latitud' => -32.94760, 'longitud' => -60.63081],
            ['nombre' => 'Distribuidor de prueba - Córdoba', 'provincia' => 'Córdoba', 'ciudad' => 'Córdoba', 'direccion' => 'Plaza San Martín, San Jerónimo y Independencia', 'latitud' => -31.41674, 'longitud' => -64.18358],
            ['nombre' => 'Distribuidor de prueba - Mendoza', 'provincia' => 'Mendoza', 'ciudad' => 'Mendoza', 'direccion' => 'Plaza Independencia, Chile y General Espejo', 'latitud' => -32.88973, 'longitud' => -68.84450],
        ];

        foreach ($distribuidores as $datos) {
            Distribuidor::updateOrCreate(['nombre' => $datos['nombre']], $datos);
        }

        for ($number = 1; $number <= 7; $number++) {
            Distribuidor::query()
                ->where('nombre', 'Distribuidor '.$number)
                ->where('provincia', 'Provincia '.$number)
                ->where('ciudad', 'Ciudad '.$number)
                ->where('direccion', 'Direccion '.$number)
                ->delete();
        }
    }
}
