<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pacientes\StorePacienteRequest;
use App\Services\PacienteService;

class StoreController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function __invoke(StorePacienteRequest $request)
    {
        $paciente = $this->pacienteService->createPaciente($request->validated());
        return response()->json($paciente, 201);
    }
}
