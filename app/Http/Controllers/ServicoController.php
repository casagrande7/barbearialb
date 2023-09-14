<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function store(ServicoFormRequest $request){
        $servicos = Servico::create([
            'Nome' => $request -> Nome,
            'Preco' => $request -> Preco,
            'Descricao' => $request -> Descricao,
            'Duracao' => $request -> Duracao
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Serviço cadastrado com sucesso",
            "data" => $servicos
        ], 200);
    }

    public function pesquisarPorId($id){
        $servicos = Servico::find($id);
        if($servicos == null){
            return response()-> json([
                'status' => false,
                'data' => "Serviço não encontrado"
            ]);
        }
        return response()-> json([
            'status' => true,
            'data' => $servicos
        ]);
    }

    public function pesquisaPorNome(Request $request){
        $servicos = Servico::where('nome', 'like', '%'. $request->Nome .'%')->get();

        if(count($servicos)> 0){

        return response()->json([
            'status' => true,
            'data' => $servicos 
        ]);       

    }
    return response()->json([
        'status' => false,
        'message' => 'Não há resultados para pesquisa.'

    ]);
}

public function excluir($id){
    $servicos = Servico::find($id);

    if(!isset($servicos)){
        return response() -> json([
            'status' => false,
            'message' => "Serviço não encontrado"
        ]);
    }

    $servicos->delete();
    return response() -> json([
        'status' => true,
        'message' => "Serviço excluído com sucesso"
    ]);
}

public function update(Request $request){
    $servicos = Servico::find($request->id);

    if(!isset($servicos)){
        return response() ->json([
            'status' => false,
            'message' => "Usuário não encontrado"
        ]);
    }
    if(isset($request->Nome)){
        $servicos->Nome = $request-> Nome;
    }

    if(isset($request->Preco)){
        $servicos->Preco = $request -> Preco;
    }

    if(isset($request->Descricao)){
        $servicos->Descricao = $request->Descrico;
    }

    if(isset($request->Duracao_Do_Servico)){
        $servicos->Duracao_Do_Servico = $request->Duracao_Do_Servico;
    }

    $servicos->update();
    return response()-> json([
        'status' => true,
        'message' => "Serviço atualizado"
    ]);
}

public function retornarTodos(){
    $servicos = Servico::all();

    return response()->json([
        'status' => true,
        'data' => $servicos
    ]);       
}




}
