<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
        'genero'
    ];

    protected function nome(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => "Dr(a). {$value}",
            set: fn (string $value) => preg_replace('/^(dr|dra|dr\(a\))\s*\.\s*/i', '', $value)
        );
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
