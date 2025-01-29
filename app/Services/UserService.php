<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;

class UserService
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers()
    {
        try {
            return $this->repository->all();
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to retrieve users', 'message' => $e->getMessage()];
        }
    }

    public function createUser(array $data)
    {
        try {
            return $this->repository->create($data);
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return ['error' => 'Failed to create user', 'message' => $e->getMessage()];
        }
    }

    // Add more methods for update and delete with similar error handling
}
