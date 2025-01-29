<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'celular'
    ];

    protected function nome(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
            set: fn (string $value) => ucwords(mb_strtolower($value))
        );
    }

    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $value = preg_replace('/[^0-9]/', '', $value);
                if (strlen($value) === 11) {
                    return sprintf('%s.%s.%s-%s',
                        substr($value, 0, 3),
                        substr($value, 3, 3),
                        substr($value, 6, 3),
                        substr($value, 9, 2)
                    );
                }
                return $value;
            },
            set: fn (string $value) => preg_replace('/[^0-9]/', '', $value)
        );
    }

    protected function celular(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $value = preg_replace('/[^0-9]/', '', $value);
                if (strlen($value) === 11) {
                    return sprintf('(%s) %s-%s',
                        substr($value, 0, 2),
                        substr($value, 2, 5),
                        substr($value, 7)
                    );
                }
                return $value;
            },
            set: fn (string $value) => preg_replace('/[^0-9]/', '', $value)
        );
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'consultas')
            ->withPivot('data')
            ->withTimestamps();
    }
}
