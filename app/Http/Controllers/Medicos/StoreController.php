<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medicos\StoreMedicoRequest;
use App\Http\Resources\MedicoResource;
use App\Services\MedicoService;

class StoreController extends Controller
{
    protected $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    public function __invoke(StoreMedicoRequest $request)
    {
        $medico = $this->medicoService->createMedico($request->validated());
        
        return new MedicoResource($medico);
    }
}
