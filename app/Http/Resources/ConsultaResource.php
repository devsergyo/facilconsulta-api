<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MedicoResource;
use App\Http\Resources\PacienteResource;

class ConsultaResource extends JsonResource
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
            'medico' => new MedicoResource($this->whenLoaded('medico')),
            'paciente' => new PacienteResource($this->whenLoaded('paciente')),
            'data' => $this->data,
        ];
    }
}
