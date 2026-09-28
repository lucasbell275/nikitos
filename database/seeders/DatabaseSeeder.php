<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'lucas@gmail.com'],
            ['name' => 'Administrador Nikitos', 'password' => 'lucas123', 'is_admin' => true]
        );

        $admin->is_admin = true;
        $admin->save();

        $this->call([
            HomeSettingsSeeder::class,
            CategoriasSeeder::class,
            ProductosSeeder::class,
            NosotrosSeeder::class,
            RecetasSeeder::class,
            DistribuidorSeeder::class,
            ClienteSeeder::class,
        ]);
    }
}
