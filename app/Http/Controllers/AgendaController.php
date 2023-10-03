<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda(AgendaFormRequest $request)
    {
        $agenda = Agenda::create([
            'profissional_id' => $request->profissional,
            'cliente_id' => $request -> cliente_id,
            'servico_id' => $request -> servico_id,
            'data_hora' => $request->data_hora,
            'tipo_pagamento' => $request->tipo_pagamento,
            'valor' => $request->valor

        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Agendamento realizado com sucesso",
            "data" => $agenda
        ], 200);
    }
}
