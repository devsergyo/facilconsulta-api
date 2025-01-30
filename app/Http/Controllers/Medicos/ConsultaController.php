<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consultas\StoreConsultaRequest;
use App\Http\Resources\ConsultaResource;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;

class ConsultaController extends Controller
{
    public function __invoke(StoreConsultaRequest $request)
    {
        // Validar existência do médico e paciente
        $medico = Medico::findOrFail($request->medico_id);
        $paciente = Paciente::findOrFail($request->paciente_id);

        // Criar a consulta
        $consulta = Consulta::create([
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data' => $request->data
        ]);

        // Carregar os relacionamentos
        $consulta->load(['medico', 'paciente']);

        return new ConsultaResource($consulta);
    }
}
