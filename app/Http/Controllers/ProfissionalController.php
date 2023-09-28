<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function store(ProfissionalFormRequest $request){
        $profissional= Profissional::create([
            'nome' => $request-> nome,
            'celular' => $request -> celular,
            'cpf' => $request -> cpf,
            'email' => $request -> email,
            'dataNascimento' => $request -> dataNascimento,
            'cidade' => $request -> cidade,
            'estado' => $request -> estado,
            
        ]);
    }
}
