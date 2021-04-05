<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunosTurmas extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'turma_id'
    ];

    public $timestamps = false;

    public function Alunos()
    {
        return $this->belongsToMany(Alunos::class);
    }

    public function Turmas()
    {
        return $this->belongsToMany(Turmas::class);
    }
}
