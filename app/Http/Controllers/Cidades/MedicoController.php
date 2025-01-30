<?php

namespace App\Http\Controllers\Cidades;

use App\Http\Controllers\Controller;
use App\Http\Resources\MedicoResource;
use App\Models\Cidade;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function __invoke(Request $request, $id_cidade)
    {
        $cidade = Cidade::findOrFail($id_cidade);
        
        $medicos = $cidade->medicos()
            ->orderBy('nome', 'asc')
            ->get();

        return MedicoResource::collection($medicos);
    }
}
