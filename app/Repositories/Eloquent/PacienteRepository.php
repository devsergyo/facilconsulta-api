<?php

namespace App\Repositories\Eloquent;

use App\Models\Paciente;
use App\Repositories\Interfaces\PacienteRepositoryInterface;

class PacienteRepository implements PacienteRepositoryInterface
{
    public function all()
    {
        return Paciente::all();
    }

    public function find($id)
    {
        return Paciente::find($id);
    }

    public function create(array $data)
    {
        return Paciente::create($data);
    }

    public function update($id, array $data)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            $paciente->update($data);
            return $paciente;
        }
        return null;
    }

    public function delete($id)
    {
        $paciente = Paciente::find($id);
        if ($paciente) {
            return $paciente->delete();
        }
        return false;
    }
}
