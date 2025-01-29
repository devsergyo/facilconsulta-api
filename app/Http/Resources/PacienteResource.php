<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ConsultaResource;
use App\Http\Resources\MedicoResource;

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
            'consultas' => $this->consultas ? ConsultaResource::collection($this->consultas) : [],
            'medicos' => $this->medicos ? MedicoResource::collection($this->medicos) : [],
        ];
    }
}
