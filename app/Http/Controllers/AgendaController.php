<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda(AgendaFormRequest $request){
        $agenda= Agenda::create([
        'profissional_id' => $request -> profissional,
        'cliente_id' => $request -> cliente,
        'servico_id' => $request -> servico,
        'data_hora' => $request -> dataHora,
        'tipo_pagamento' => $request -> tipoPagamento,
        'valor' => $request -> valor

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Cliente cadastrado com sucesso",
            "data" => $agenda
        ], 200);
    }
}
