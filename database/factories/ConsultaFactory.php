<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ConsultaFactory extends Factory
{
    protected $model = \App\Models\Consulta::class;

    public function definition()
    {
        return [
            'medico_id' => \App\Models\Medico::factory(),
            'paciente_id' => \App\Models\Paciente::factory(),
            'data' => Carbon::instance($this->faker->dateTimeBetween('now', '+1 year'))->format('d/m/Y'),
        ];
    }
}
