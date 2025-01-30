<?php

namespace App\Repositories\Eloquent;

use App\Models\Medico;
use App\Repositories\Interfaces\MedicoRepositoryInterface;

class MedicoRepository implements MedicoRepositoryInterface
{
    public function all()
    {
        return Medico::orderBy('nome', 'asc')->get();
    }

    public function find($id)
    {
        return Medico::find($id);
    }

    public function create(array $data)
    {
        return Medico::create($data);
    }

    public function update($id, array $data)
    {
        $medico = Medico::find($id);
        if ($medico) {
            $medico->update($data);
            return $medico;
        }
        return null;
    }

    public function delete($id)
    {
        $medico = Medico::find($id);
        if ($medico) {
            return $medico->delete();
        }
        return false;
    }

    public function findByName($nome = null)
    {
        return Medico::when($nome, function ($query, $nome) {
                return $query->where('nome', 'like', "%{$nome}%");
            })
            ->orderBy('nome', 'asc')
            ->get();
    }

    public function getPacientesByMedico(int $idMedico, string $nomePaciente = null, bool $agendados = true)
    {
        $medico = Medico::findOrFail($idMedico);

        $query = $medico->pacientes()
            ->with(['consultas' => function ($query) {
                $query->orderBy('data', 'asc');
            }]);

        // Filtrar por nome se fornecido
        if (!empty($nomePaciente)) {
            $query->where('nome', 'like', '%' . $nomePaciente . '%');
        }

        // Filtrar apenas pacientes com consultas agendadas
        if (!empty($agendados)) {
            $query->whereHas('consultas', function ($query) {
                $query->where('data', '>=', now());
                $query->orderBy('data', 'asc');
            });
        }

        return $query->orderBy('nome', 'ASC')->get();
    }
}
