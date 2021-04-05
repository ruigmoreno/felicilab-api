<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turmas extends Model
{

    protected $fillable = [
        'ano_execucao',
        'nivel_educacao',
        'nivel_serie',
        'turno',
    ];

    public function AlunosTurmas()
    {
        return $this->hasMany(AlunosTurmas::class);
    }
}
