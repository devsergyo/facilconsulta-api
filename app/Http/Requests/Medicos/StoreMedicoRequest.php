<?php

namespace App\Http\Requests\Medicos;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:100',
            'cidade_id' => 'required|exists:cidades,id'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do médico é obrigatório',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres',
            'especialidade.required' => 'A especialidade é obrigatória',
            'especialidade.max' => 'A especialidade não pode ter mais que 100 caracteres',
            'cidade_id.required' => 'A cidade é obrigatória',
            'cidade_id.exists' => 'A cidade selecionada não existe'
        ];
    }
}
