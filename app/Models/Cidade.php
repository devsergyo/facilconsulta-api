<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'estado'];

    /**
     * Obtém os médicos da cidade.
     */
    public function medicos(): HasMany
    {
        return $this->hasMany(Medico::class);
    }
}
