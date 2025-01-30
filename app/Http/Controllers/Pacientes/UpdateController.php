<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\UpdatePacienteRequest;
use App\Services\PacienteService;

class UpdateController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function __invoke(UpdatePacienteRequest $request, $id_paciente)
    {
        $paciente = $this->pacienteService->updatePaciente($id_paciente, $request->validated());
        return response()->json($paciente);
    }
}
