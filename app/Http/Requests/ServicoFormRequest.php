<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Nome' => 'required|max:80|min:5|unique:servicos,Nome',
            'Preco' => 'required|decimal:2',
            'Descricao' => 'required|max:200|min:10',
            'Duracao' => 'required|numeric'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()

        ]));
    }
    
    public function messages(){
        return [
            'Nome.required' => 'Nome é obrigatório',
            'Nome.max' => 'O campo Nome deve conter no máximo 80 caracteres',
            'Nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'Preco.required' => 'Preço é obrigatório',
            'Preco.decimal' => 'O campo Preço deve conter apenas valores em decimais',
            'Descricao.required' => 'Descrição é obrigatório',
            'Descricao.max' => 'O campo Descrição deve conter no máximo 200 caracteres',
            'Descricao.min' => 'O campo Descrição deve conter no mínimo 10 caracteres',
            'Duracao.required' => 'Duração do Serviço é obrigatório',
            'Duracao.numeric' => 'O campo Duração do Serviço deve conter apenas números'
        ];
    }
   
}
