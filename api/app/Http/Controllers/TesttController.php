<?php

namespace App\Http\Controllers;

use App\Models\Testes;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TesttController extends Controller
{
    public function index()
    {
        return Testes::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required | max:80',
                'email' => 'required',
                'endereco' => 'required',
                'telefone' => 'required',
                'curriculo' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        } else {
            try {
                return response()->json(Testes::create($request->all()), 201);
            } catch (QueryException $exception) {
                return response()->json(['Erro de conex]ao com o banco de dados'],
                    Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function show(int $id)
    {
        $dados = Testes::find($id);
        if (is_null($dados)) {
            return \response()->json('',204);
        }
        return \response()->json($dados);
    }

    public function update(int $id, Request $request)
    {
        $dados = Testes::find($id);
        if (is_null($dados)) {
            return \response()->json(['erro' => 'Recurso não encontrado'],404);
        }
        $dados->fill($request->all());
        $dados->save();
        return $dados;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Testes::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        return response()->json('', 204);
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
}
