<?php

namespace App\Http\Requests\Pacientes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string', 'max:255'],
            'cpf' => [
                'sometimes',
                'string',
                'size:11',
                Rule::unique('pacientes', 'cpf')->ignore($this->route('paciente'))
            ],
            'celular' => ['sometimes', 'string', 'size:11'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.max' => 'O nome não pode ter mais que 255 caracteres',
            'cpf.size' => 'O CPF deve ter exatamente 11 dígitos',
            'cpf.unique' => 'Este CPF já está cadastrado',
            'celular.size' => 'O celular deve ter exatamente 11 dígitos',
        ];
    }
}
