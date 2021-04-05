<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunosController extends Controller
{
    /**
     * Display all listing of the resource (alunos).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Alunos::all();
    }

    /**
     * Store a newly created resource (alunos) in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = $this->validateRequest($data);
        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'erros' => $validator->errors()->messages()
            ]);
        }

        $alunos = Alunos::create($data);

        if (!empty($alunos)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' =>  'Usuário cadastrado com sucesso!'
            ]);
        }
    }

    /**
     * Display the specified resource (alunos).
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alunos::find($id);
    }

    /**
     * Update the specified resource (alunos) in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update an alunos
        $alunos = Alunos::find($id);
        $data = $request->all();

        $validator = $this->validateRequest($data);
        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'erros' => $validator->errors()->messages()
            ]);
        }

        $alunos->update($request->all());

        if (!empty($alunos)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' =>  'Usuário atualizado com sucesso'
            ]);
        }
    }

    /**
     * Remove the specified resource (alunos) from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Alunos::find($id);
        if (empty($aluno)) {
            return response()->json([
                'sucesso' => false,
                'erros' =>  [
                    'Não foi possível excluir usuário. '
                        . 'Usuário não encontrado.'
                ]
            ]);
        }

        if (Alunos::destroy($id)) {
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Usuário excluído com sucesso'
            ]);
        }
    }

    private function validateRequest($data)
    {
        return Validator::make($data, [
            'nome' => 'required',
            'email' => 'required|email',
        ]);
    }
}
