<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'celular' => $this->celular,
            // Adicione relacionamentos relevantes aqui
            'consultas' => ConsultaResource::collection($this->consultas),
            'medicos' => MedicoResource::collection($this->medicos),
        ];
    }
}
