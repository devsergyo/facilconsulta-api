<?php

namespace App\Http\Controllers\Cidades;

use App\Services\CidadeService;
use App\Http\Resources\CidadeCollection;
use Illuminate\Http\Request;

class IndexController
{
    protected $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function __invoke(Request $request)
    {
        $cidades = $this->cidadeService->getAllCidades($request);
        return new CidadeCollection($cidades);
    }
}
