<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\CidadesSeeder;
use Database\Seeders\ConsultasSeeder;
use Database\Seeders\MedicosSeeder;
use Database\Seeders\PacientesSeeder;
use Database\Seeders\UsuariosSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsuariosSeeder::class,
            CidadesSeeder::class,
            MedicosSeeder::class,
            PacientesSeeder::class,            
            ConsultasSeeder::class,
        ]);
    }
}
