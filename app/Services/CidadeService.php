<?php

namespace App\Services;

use App\Repositories\Interfaces\CidadeRepositoryInterface;
use Exception;

class CidadeService
{
    protected $repository;

    public function __construct(CidadeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCidades()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve cidades', 'message' => $e->getMessage()];
        }
    }

    public function createCidade(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to create cidade', 'message' => $e->getMessage()];
        }
    }

    // Add more methods for update and delete with similar error handling
}
