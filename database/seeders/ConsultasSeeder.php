<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consulta;

class ConsultasSeeder extends Seeder
{
    public function run()
    {
        Consulta::factory()->count(10)->create();
    }
}
