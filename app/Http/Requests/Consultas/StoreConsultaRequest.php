<?php

namespace App\Http\Requests\Consultas;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreConsultaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // Garante que a data de hoje esteja no formato correto para comparação
        $this->merge([
            'today' => Carbon::now()->format('d/m/Y')
        ]);
    }

    public function rules(): array
    {
        return [
            'medico_id' => ['required', 'exists:medicos,id'],
            'paciente_id' => ['required', 'exists:pacientes,id'],
            'data' => [
                'required',
                'regex:/^\d{2}\/\d{2}\/\d{4}$/',
                'after_or_equal:today'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'medico_id.required' => 'O médico é obrigatório',
            'medico_id.exists' => 'Médico não encontrado',
            'paciente_id.required' => 'O paciente é obrigatório',
            'paciente_id.exists' => 'Paciente não encontrado',
            'data.required' => 'A data é obrigatória',
            'data.regex' => 'A data deve estar no formato dd/mm/aaaa',
            'data.after_or_equal' => 'A data deve ser hoje ou uma data futura',
        ];
    }
}
