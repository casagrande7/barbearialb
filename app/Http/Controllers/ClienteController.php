<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request){
        $clientes= Cliente::create([
            'nome' => $request-> nome,
            'celular' => $request-> celular,
            'email' => $request-> email,
            'cpf' => $request-> cpf,
            'dataNascimento' => $request-> dataNascimento,
            'cidade' => $request-> cidade,
            'estado' => $request -> estado,
            'país' => $request -> país,
            'rua' => $request-> rua,
            'número' => $request-> número,
            'bairro' => $request -> bairro,
            'cep'=> $request -> cep,
            'complemento'=> $request -> complemento,
            'senha' => $request -> senha

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $clientes
        ], 200);
    }

    public function pesquisaPorId($id){
        $clientes = Cliente::find($id);
        if($clientes == null){
            return response()-> json([
                'status' => false,
                'data' => "Cliente não encontrado"
            ]);
        }
        return response()-> json([
            'status' => true,
            'data' => $clientes
        ]);
    }


}
