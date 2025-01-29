<?php

namespace App\Services;

use App\Repositories\Interfaces\PacienteRepositoryInterface;
use Exception;

class PacienteService
{
    protected $repository;

    public function __construct(PacienteRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPacientes()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve pacientes', 'message' => $e->getMessage()];
        }
    }

    public function createPaciente(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to create paciente', 'message' => $e->getMessage()];
        }
    }

    public function findByName(?string $nome)
    {
        try {
            if ($nome) {
                return $this->repository->findByName($nome);
            }
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to find pacientes', 'message' => $e->getMessage()];
        }
    }
}
