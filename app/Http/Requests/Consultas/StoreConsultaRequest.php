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
            'today' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    public function rules(): array
    {
        return [
            'medico_id' => ['required', 'exists:medicos,id'],
            'paciente_id' => ['required', 'exists:pacientes,id'],
            'data' => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:today'
            ]
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
            'data.date_format' => 'A data deve estar no formato Y-m-d H:i:s',
            'data.after_or_equal' => 'A data deve ser hoje ou uma data futura'
        ];
    }
}
