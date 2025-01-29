<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\Controller;
use App\Services\MedicoService;
use App\Http\Resources\MedicoResource;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function __invoke(Request $request)
    {
        $nome = $request->query('nome');
        $medicos = $this->medicoService->getMedicosByName($nome);
        
        return MedicoResource::collection($medicos);
    }
}
