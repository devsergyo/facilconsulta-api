<?php

namespace App\Repositories\Eloquent;

use App\Models\Paciente;
use App\Repositories\Interfaces\PacienteRepositoryInterface;

class PacienteRepository implements PacienteRepositoryInterface
{
    protected $model;

    public function __construct(Paciente $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with(['consultas', 'medicos'])->get();
    }

    public function find($id)
    {
        return $this->model->with(['consultas', 'medicos'])->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $paciente = $this->model->find($id);
        if ($paciente) {
            $paciente->update($data);
            return $paciente;
        }
        return null;
    }

    public function delete($id)
    {
        $paciente = $this->model->find($id);
        if ($paciente) {
            return $paciente->delete();
        }
        return false;
    }

    public function findByName(string $nome)
    {
        return $this->model->with(['consultas', 'medicos'])
            ->where('nome', 'like', "%{$nome}%")
            ->get();
    }
}
