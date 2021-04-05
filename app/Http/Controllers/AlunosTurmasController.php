<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use App\Models\AlunosTurmas;
use App\Models\Turmas;
use Illuminate\Http\Request;

class AlunosTurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlunosTurmas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (empty($data)) {
            return response()->json([
                'sucesso' => false,
                'erros'   => ['Falha ao criar AlunoTurma. Campos estão vazios.']
            ]);
        }
        $hasAluno = array_key_exists('aluno_id', $data);
        $hasTurma = array_key_exists('turma_id', $data);

        if (!($hasAluno && $hasTurma)) {
            return response()->json([
                'sucesso' => false,
                'erros'   => ['Falha ao criar AlunoTurma. Um dos campos vazios']
            ]);
        }

        $aluno = Alunos::find($data['aluno_id']);
        $turma = Turmas::find($data['turma_id']);

        if (empty($aluno) || empty($turma)) {
            return response()->json([
                'sucesso' => false,
                'erros'   => ['Aluno ou Turma não encontrado.']
            ]);
        }

        $alunoTurma = new AlunosTurmas();
        $alunoTurma->aluno_id = $aluno->id;
        $alunoTurma->turma_id = $turma->id;

        if ($alunoTurma->save()) {
            return response()->json([
                'sucesso'  => true,
                'mensagem' => 'AlunoTurma cadastrado com sucesso!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (AlunosTurmas::find($id) === null) {
            return response()->json([
                'mensagem' => 'AlunoTurma não encontrado.'
            ]);
        }

        return AlunosTurmas::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AlunosTurmas::find($id);
        if (empty($data)) {
            return response()->json([
                'sucesso' => false,
                'erros'   => ['AlunoTurma não encontrado.']
            ]);
        }

        if (AlunosTurmas::destroy($id)) {
            return response()->json([
                'sucesso'  => true,
                'mensagem' => 'AlunoTurma excluído com sucesso!'
            ]);
        }
    }
}
