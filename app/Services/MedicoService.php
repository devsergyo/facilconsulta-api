<?php

namespace App\Services;

use App\Repositories\Interfaces\MedicoRepositoryInterface;
use Exception;

class MedicoService
{
    protected $repository;

    public function __construct(MedicoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllMedicos()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve medicos', 'message' => $e->getMessage()];
        }
    }

    public function createMedico(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to create medico', 'message' => $e->getMessage()];
        }
    }

    public function getMedicosByName($nome = null)
    {
        try {
            return $this->repository->findByName($nome);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve medicos by name', 'message' => $e->getMessage()];
        }
    }

    // Add more methods for update and delete with similar error handling
}
