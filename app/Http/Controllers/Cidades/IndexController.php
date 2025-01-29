<?php

namespace App\Http\Controllers\Cidades;

use App\Services\CidadeService;
use App\Http\Resources\CidadeCollection;

class IndexController
{
    protected $cidadeService;

    public function __construct(CidadeService $cidadeService)
    {
        $this->cidadeService = $cidadeService;
    }

    public function __invoke()
    {
        $cidades = $this->cidadeService->getAllCidades();
        return new CidadeCollection($cidades);
    }
}
