<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Models\Medico;
use App\Services\MedicoService;
use Illuminate\Http\Request;

class MedicosPacienteController extends Controller
{

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function __invoke(Request $request, $id_medico)
    {
        $pacientes = $this->medicoService->getPacientesByMedico($request);
        return PacienteResource::collection($pacientes);
    }
}
