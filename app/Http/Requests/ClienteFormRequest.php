<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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
            'Nome' => 'required|max:120|min:5',
            'Celular' => 'required|max:11|min:10',
            'Email' => 'required|max:120|unique:cliente,Email',
            'CPF' => 'required|max:11|min:11|unique:cliente,CPF',
            'DataNascimento' => 'required|date',
            'Cidade' => 'required|max:120',
            'Estado' => 'required|max:2|min:2',
            'País' => 'required|max:80',
            'Rua' => 'required|max:120',
            'Número' => 'required|max:10',
            'Bairro' => 'required|max:100',
            'CEP' => 'required|max:8|min:8',
            'Complemento' => 'max:150',
            'Senha' => 'required'

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
            'Nome.required' => 'O campo Nome é obrigatório',
            'Nome.max' => 'O campo Nome deve conter no máximo 120 caracteres',
            'Nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'Celular.required' => 'O campo Celular é obrigatório',
            'Celular.max' => 'O campo Celular deve conter no máximo 11 caracteres',
            'Celular.min' => 'O campo Celular deve conter no mínimo 10 caracteres',
            'Email.required' => 'O campo Email é obrigatório',
            'Email.max' => 'O campo Email deve conter no máximo 120 caracteres',
            'Email.unique' => 'Email já cadastrado no sistema',
            'CPF.required' => 'O campo CPF é obrigatório',
            'CPF.max' => 'O campo CPF deve conter no máximo 11 caracteres',
            'CPF.min' => 'O campo CPF deve conter no mínimo 11 caracteres',
            'CPF.unique' => 'CPF já cadastrado no sistema',
            'DataNascimento.required' => 'O campo DataNascimento é obrigatório',
            'DataNascimento.date' => 'O campo DataNascimento deve conter só datas',
            'Cidade.required' => 'O campo Cidade é obrigatório',
            'Cidade.max' => 'O campo Cidade deve conter no máximo 120 caracteres',
            'Estado.required' => 'O campo Estado é obrigatório',
            'Estado.max' => 'O campo Estado deve conter no máximo 2 caracteres',
            'Estado.min' => 'O campo Estado deve conter no mínimo 2 caracteres',
            'País.required' => 'O campo País é orbigatório',
            'País.max' => 'O campo País deve conter no máximo 80 caracteres',
            'Rua.required' => 'O campo Rua é obrigatório',
            'Rua.max' => 'O campo Rua deve conter no máximo 120 caracteres',
            'Número.required' => 'O campo Número é obrigatório',
            'Número.max' => 'O campo Número deve conter no máximo 10 caracteres',
            'Bairro.required' => 'O campo Bairro é obrigatório',
            'Bairro.max' => 'O campo Bairro deve conter no máximo 100 caracteres',
            'CEP.required' => 'O campo CEP é obrigatório',
            'CEP.max' => 'O campo CEP deve conter no máximo 8 caracteres',
            'CEP.min' => 'O campo CEP deve conter no mínimo 8 caracteres',
            'Complemento.max' => 'O campo Complemento deve conter no máximo 150 caracteres',
            'Senha.required' => 'O campo Senha é obrigatório'

        ];
    }
}
