<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = \App\Models\Medico::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->word,
            'cidade_id' => \App\Models\Cidade::factory(),
        ];
    }
}
