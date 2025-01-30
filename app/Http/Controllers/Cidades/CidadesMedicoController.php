<?php

namespace App\Http\Controllers\Cidades;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicoResource;
use App\Models\Cidade;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadesMedicoController extends Controller
{
    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }
    public function __invoke(Request $request, $id_cidade)
    {
        $cidade = Cidade::findOrFail($id_cidade);

        $medicos = $cidade->medicos()
            ->orderBy('nome', 'asc')
            ->get();

        return MedicoResource::collection($medicos);
    }
}
