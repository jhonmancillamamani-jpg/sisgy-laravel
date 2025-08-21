<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::updateOrCreate(
            ['nombre' => 'admin1'],
            ['password' => Hash::make('admin123'), 'rol' => 'admin']
        );

        Usuario::updateOrCreate(
            ['nombre' => 'entrenador'],
            ['password' => Hash::make('entrenador123'), 'rol' => 'entrenador']
        );

        Usuario::updateOrCreate(
            ['nombre' => 'empleado'],
            ['password' => Hash::make('empleado123'), 'rol' => 'empleado']
        );
    }
}
