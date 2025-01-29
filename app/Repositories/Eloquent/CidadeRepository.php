<?php

namespace App\Repositories\Eloquent;

use App\Models\Cidade;
use App\Repositories\Interfaces\CidadeRepositoryInterface;

class CidadeRepository implements CidadeRepositoryInterface
{
    public function all()
    {
        return Cidade::all();
    }

    public function find($id)
    {
        return Cidade::find($id);
    }

    public function create(array $data)
    {
        return Cidade::create($data);
    }

    public function update($id, array $data)
    {
        $cidade = Cidade::find($id);
        if ($cidade) {
            $cidade->update($data);
            return $cidade;
        }
        return null;
    }

    public function delete($id)
    {
        $cidade = Cidade::find($id);
        if ($cidade) {
            return $cidade->delete();
        }
        return false;
    }
}
