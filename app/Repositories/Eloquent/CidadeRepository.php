<?php

namespace App\Repositories\Eloquent;

use App\Models\Cidade;
use App\Repositories\Interfaces\CidadeRepositoryInterface;

class CidadeRepository implements CidadeRepositoryInterface
{
    public function all()
    {
        return Cidade::orderBy('nome', 'asc')->get();
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

    public function findByName($nome = null)
    {
        return Cidade::where('nome', 'like', '%' . $nome . '%')
            ->orderBy('nome', 'asc')
            ->get();
    }

    public function getMedicosPorCidade(int $idCidade = null)
    {

        return Cidade::with('medicos')
            ->where('id_cidade', $idCidade)
            ->get();
    }
}
