<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacientesSeeder extends Seeder
{
    public function run()
    {
        Paciente::factory()->count(10)->create();
    }
}
