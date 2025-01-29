<?php

namespace App\Repositories\Eloquent;

use App\Models\Medico;
use App\Repositories\Interfaces\MedicoRepositoryInterface;

class MedicoRepository implements MedicoRepositoryInterface
{
    public function all()
    {
        return Medico::all();
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
}
