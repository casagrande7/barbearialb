<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id' => 'required|integer',
            'cliente_id' => 'integer',
            'servico_id' => 'integer',
            'data_hora' =>  'required|date',
            'tipo_pagamento' => 'max:20|min: 3',
            'valor' => 'decimal:2'

        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()

        ]));
    }
    public function messages(){
        return[
            'tipo_pagamento.max' => 'O campo Tipo de Pagamento deve conter no máximo 20 caracteres',
            'tipo_pagamento.min' => 'O campo Tipo de Pagamento deve conter no mínimo 3 caracteres',
            'valor.decimal' => 'O campo Valor deve conter apenas valores em reais',
            'data_hora.required' => 'O campo Data e Hora é obrigatório',
            'data_hora.date' => 'O campo Data e Hora deve conter apenas datas',
            'profissional_id.integer' => 'O ID tem que ser um número inteiro',
            'profissional_id.required' => 'O campo Profissional é obrigatório',
            'cliente_id.integer' => 'O ID tem que ser um número inteiro',
            'servico_id.integer' => 'O ID tem que ser um número'
        ];
    }
}
