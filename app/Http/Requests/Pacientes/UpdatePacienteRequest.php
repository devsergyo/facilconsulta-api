<?php

namespace App\Http\Requests\Pacientes;

use Illuminate\Foundation\Http\FormRequest;

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
            'celular' => ['sometimes', 'string', 'size:11'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.max' => 'O nome não pode ter mais que 255 caracteres',
            'celular.size' => 'O celular deve ter exatamente 11 dígitos',
        ];
    }
}
