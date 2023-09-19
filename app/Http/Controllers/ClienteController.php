<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(ClienteFormRequest $request){
        $clientes= Cliente::create([
            'Nome' => $request-> Nome,
            'Celular' => $request-> Celular,
            'Email' => $request-> Email,
            'CPF' => $request-> CPF,
            'DataNascimento' => $request-> DataNascimento,
            'Cidade' => $request-> Cidade,
            'Estado' => $request -> Estado,
            'País' => $request -> País,
            'Rua' => $request-> Rua,
            'Número' => $request-> Número,
            'Bairro' => $request -> Bairro,
            'CEP'=> $request -> CEP,
            'Complemento'=> $request -> Complemento,
            'Senha' => $request -> Senha

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $clientes
        ], 200);
    }
}
