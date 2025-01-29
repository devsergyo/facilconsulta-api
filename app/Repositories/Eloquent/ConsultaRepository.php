<?php

namespace App\Repositories\Eloquent;

use App\Models\Consulta;
use App\Repositories\Interfaces\ConsultaRepositoryInterface;

class ConsultaRepository implements ConsultaRepositoryInterface
{
    public function all()
    {
        return Consulta::all();
    }

    public function find($id)
    {
        return Consulta::find($id);
    }

    public function create(array $data)
    {
        return Consulta::create($data);
    }

    public function update($id, array $data)
    {
        $consulta = Consulta::find($id);
        if ($consulta) {
            $consulta->update($data);
            return $consulta;
        }
        return null;
    }

    public function delete($id)
    {
        $consulta = Consulta::find($id);
        if ($consulta) {
            return $consulta->delete();
        }
        return false;
    }
}
