<?php

namespace App\Services;

use App\Repositories\Interfaces\ConsultaRepositoryInterface;
use Exception;

class ConsultaService
{
    protected $repository;

    public function __construct(ConsultaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllConsultas()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve consultas', 'message' => $e->getMessage()];
        }
    }

    public function createConsulta(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to create consulta', 'message' => $e->getMessage()];
        }
    }

    // Add more methods for update and delete with similar error handling
}
