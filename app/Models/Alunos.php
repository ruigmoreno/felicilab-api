<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'data_nascimento',
        'genero'
    ];

    public function AlunosTurmas()
    {
        return $this->hasMany(AlunosTurmas::class);
    }
}
