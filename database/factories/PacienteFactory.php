<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = \App\Models\Paciente::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->numerify('###########'),
            'celular' => $this->faker->numerify('11#########'), // Começa com 11 (São Paulo) e mais 9 dígitos
        ];
    }
}
