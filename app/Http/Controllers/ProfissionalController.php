<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\UpdateProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request){
        $profissionals= Profissional::create([
            'nome' => $request-> nome,
            'celular' => $request -> celular,
            'cpf' => $request -> cpf,
            'email' => $request -> email,
            'dataNascimento' => $request -> dataNascimento,
            'cidade' => $request -> cidade,
            'estado' => $request -> estado,
            'pais' => $request -> pais,
            'rua' => $request -> rua,
            'numero' => $request -> numero,
            'bairro' => $request -> bairro,
            'cep' => $request -> cep,
            'complemento' => $request -> complemento,
            'salario' => $request -> salario,
            'senha' => $request ->  senha

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Profissional cadastrado com sucesso",
            "data" => $profissionals
        ], 200);
    }

    public function pesquisandoPorId($id){
        $profissionals = Profissional::find($id);
        if($profissionals == null){
            return response()-> json([
                'status' => false,
                'data' => "Profissional não encontrado"
            ]);
        }
        return response()-> json([
            'status' => true,
            'data' => $profissionals
        ]);
    }

    public function pesquisandoPorNome(Request $request){
        $profissionals = Profissional::where('nome', 'like', '%'. $request->nome .'%')->get();

        if(count($profissionals)> 0){

        return response()->json([
            'status' => true,
            'data' => $profissionals 
        ]);       

    }
    return response()->json([
        'status' => false,
        'message' => 'Não há resultados para pesquisa.'

    ]);
}

public function pesquisandoPorCpf(Request $request){
    $profissionals = Profissional::where('cpf', 'like', '%'. $request->cpf .'%')->get();

    if(count($profissionals)> 0){

    return response()->json([
        'status' => true,
        'data' => $profissionals
    ]);       

}
return response()->json([
    'status' => false,
    'message' => 'Não há resultados para pesquisa.'

]);
}

public function pesquisandoPorEmail(Request $request){
    $profissionals = Profissional::where('email', 'like', '%'. $request->email .'%')->get();

    if(count($profissionals)> 0){

    return response()->json([
        'status' => true,
        'data' => $profissionals
    ]);       

}
return response()->json([
    'status' => false,
    'message' => 'Não há resultados para pesquisa.'

]);
}

public function pesquisandoPorCelular(Request $request){
    $profissionals = Profissional::where('celular', 'like', '%'. $request->celular .'%')->get();

    if(count($profissionals)> 0){

    return response()->json([
        'status' => true,
        'data' => $profissionals
    ]);       

}
return response()->json([
    'status' => false,
    'message' => 'Não há resultados para pesquisa.'

]);
}

public function retornandoTodosProfissionais(){
    $profissionals = Profissional::all();

    return response()->json([
        'status' => true,
        'data' => $profissionals
    ]);       
}
   
public function atualizarProfissional(UpdateProfissionalFormRequest $request){
    $profissionals = Profissional::find($request->id);

    if(!isset($profissionals)){
        return response() ->json([
            'status' => false,
            'message' => "Profissional não encontrado"
        ]);
    }
    if(isset($request->nome)){
        $profissionals->nome = $request-> nome;
    }

    if(isset($request->cpf)){
        $profissionals->cpf = $request -> cpf;
    }

    if(isset($request->cep)){
        $profissionals->cep = $request->cep;
    }

    if(isset($request->email)){
        $profissionals->email = $request->email;
    }

    if(isset($request->celular)){
        $profissionals->celular = $request->celular;
    }

    if(isset($request->bairro)){
        $profissionals->bairro = $request->bairro;
    }

    if(isset($request->rua)){
        $profissionals->rua = $request->rua;
    }

    if(isset($request->numero)){
        $profissionals->numero = $request->numero;
    }

    if(isset($request->pais)){
        $profissionals->pais = $request->pais;
    }

    if(isset($request->complemento)){
        $profissionals->complemento = $request->complemento;
    }

    if(isset($request->cidade)){
        $profissionals->cidade = $request->cidade;
    }

    if(isset($request->estado)){
        $profissionals->estado = $request->estado;
    }

    if(isset($request->senha)){
        $profissionals->senha = $request->senha;
    }

    if(isset($request->dataNascimento)){
        $profissionals->dataNascimento = $request->dataNascimento;
    }

    if(isset($request->salario)){
        $profissionals->salario = $request->salario;
    }

    $profissionals->update();
    return response()-> json([
        'status' => true,
        'message' => "Profissional atualizado"
    ]);
}

public function deletarProfissional($id){
    $profissionals = Profissional::find($id);

    if(!isset($profissionals)){
        return response() -> json([
            'status' => false,
            'message' => "Profissional não encontrado"
        ]);
    }

    $profissionals->delete();
    return response() -> json([
        'status' => true,
        'message' => "Profissional excluído com sucesso"
    ]);
}

}
