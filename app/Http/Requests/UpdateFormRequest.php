<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateFormRequest extends FormRequest
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
            'Nome' => 'max:80|min:5',
            'Preco' => 'decimal:2',
            'Descricao' => 'max:200|min:10',
            'Duracao' => 'numeric'
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
            'Nome.max' => 'O campo Nome deve conter no máximo 80 caracteres',
            'Nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'Preco.decimal' => 'O campo Preço deve conter apenas valores em decimais',
            'Descricao.max' => 'O campo Descrição deve conter no máximo 200 caracteres',
            'Descricao.min' => 'O campo Descrição deve conter no mínimo 10 caracteres',
            'Duracao.numeric' => 'O campo Duração do Serviço deve conter apenas números'
        ];
    }
}
