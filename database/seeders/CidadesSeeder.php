<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadesSeeder extends Seeder
{
    public function run()
    {
        Cidade::factory()->count(10)->create();
    }
}
