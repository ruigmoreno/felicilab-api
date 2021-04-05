<?php

namespace App\Http\Controllers;

use App\Models\Turmas;
use Illuminate\Http\Request;

class TurmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Turmas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTurma = $request->all();

        if (empty($newTurma)) {
            return response()->json([
                'sucesso' => false,
                'erros' => [
                    'Não foi possível cadastrar turma. '
                        . 'Turma vazia!'
                ]
            ]);
        }

        $turma = Turmas::create($newTurma);

        if (!empty($turma)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' =>  'Turma cadastrada com sucesso!'
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
        return Turmas::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turma = Turmas::find($id);
        $data = $request->all();

        if (empty($data)) {
            return response()->json([
                'sucesso' => false,
                'erros' => [
                    'Não foi possível atualizar turma. '
                        . 'Turma vazia!'
                ]
            ]);
        }

        $turmaUpdated = $turma->update($data);

        if (!empty($turmaUpdated)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' =>  'Turma atualizada com sucesso!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turmas::find($id);

        if (empty($turma)) {
            return response()->json([
                'sucesso' => false,
                'erros' => [
                    'Não foi possível deletar a turma. '
                        . 'Turma não encontrada.'
                ]
            ]);
        }

        if ($turma->destroy($id)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' =>  'Turma deletada com sucesso!'
            ]);
        }
    }
}
