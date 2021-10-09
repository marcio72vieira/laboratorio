<?php

namespace App\Http\Requests\Catadores;

use Illuminate\Foundation\Http\FormRequest;

class AssociadoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'bail|required|min:3',
            'nascimento' => 'bail|required',
            'rg' => 'bail|required|min:3',
            'rgorgaoemissor' => 'bail|required|min:3',
            'cpf' => 'bail|required|min:10|unique:associados,cpf',
            'sexo' => 'bail|required',
            'racacor' => 'bail|required',
            'filiacao' => 'bail|required',
            'quantidade' => 'bail|required',
            'endereco' => 'bail|required|min:3',
            //'numero' => 'bail|required',
            'bairro_id' => 'bail|required',
            //'complemento' => 'required',
            'municipio_id' => 'bail|required',
            'zona' => 'bail|required',
            //'foneum' => 'bail|required|regex:/^\([0-9]{2}\) [0-9][0-9]{3,4}\-[0-9]{4}$/',
            //'fonedois' => 'bail|required_without_all:celular,recado|regex:/^\([1-9]{2}\) [2-9][0-9]{3,4}\-[0-9]{4}$/',
            'companhia_id' => 'bail|required',
            'areas' => 'bail|required|array',
            //'imagem' => 'bail|required'
        ];
    }
}
