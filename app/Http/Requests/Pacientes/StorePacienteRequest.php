<?php

namespace App\Http\Requests\Pacientes;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'size:11', 'unique:pacientes,cpf'],
            'celular' => ['required', 'string', 'size:11'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.size' => 'O CPF deve ter exatamente 11 dígitos',
            'cpf.unique' => 'Este CPF já está cadastrado',
            'celular.required' => 'O celular é obrigatório',
            'celular.size' => 'O celular deve ter exatamente 11 dígitos',
        ];
    }
}
