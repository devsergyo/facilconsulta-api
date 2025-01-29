<?php

namespace App\Http\Controllers\Pacientes;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Services\PacienteService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $pacienteService;

    public function __construct(PacienteService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    public function __invoke(Request $request)
    {
        $nome = $request->query('nome');
        $pacientes = $this->pacienteService->findByName($nome);
        
        return PacienteResource::collection($pacientes);
    }
}
