<?php

namespace App\Http\Controllers\Medicos;

use App\Http\Controllers\Controller;
use App\Http\Resources\PacienteResource;
use App\Models\Medico;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __invoke(Request $request, $id_medico)
    {
        $medico = Medico::findOrFail($id_medico);
        
        $query = $medico->pacientes()
            ->with(['consultas' => function ($query) {
                $query->orderBy('data', 'asc');
            }]);

        // Filtrar por nome se fornecido
        if ($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        // Filtrar apenas pacientes com consultas agendadas
        if ($request->boolean('apenas-agendadas')) {
            $query->whereHas('consultas', function ($query) {
                $query->where('data', '>=', now());
            });
        }

        $pacientes = $query->get();

        return PacienteResource::collection($pacientes);
    }
}
