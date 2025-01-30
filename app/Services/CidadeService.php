<?php

namespace App\Services;

use App\Repositories\Interfaces\CidadeRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class CidadeService
{
    protected $repository;

    public function __construct(CidadeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCidades(Request $request)
    {
        try {
            if ($request->has('nome')) {
                $nome = $request->query('nome');
                return $this->repository->findByName($nome);
            }
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
