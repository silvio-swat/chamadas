<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilaRequest extends FormRequest
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
    public function rules($id)
    {
        $valArray =  [
            'filaModel.nome'                => 'required|string|min:3|unique:filas,nome,',
            'filaModel.prioridade'          => 'required',
            'filaModel.temp_minimo_atend'   => '',
            'filaModel.temp_maximo_atend'   => '',
            'filaModel.temp_ideal_atend'    => '',
            'filaModel.temp_maximo_espera'  => '',
            'filaModel.pref_max_prio'       => '',
            'filaModel.qtd_senhas'          => '',
            'filaModel.qtd_senhas_preferen' => '',
        ];
        if(!empty($id)){
            $valArray['filaModel.nome'] = ['required', 'string', Rule::unique('filas', 'nome')->ignore($id)];
        }
        return  $valArray;
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'filaModel.nome.required'       => 'Digite o nome!',
            'filaModel.nome.unique'         => 'Fila já cadastrada, Tente outro nome!',
            'filaModel.prioridade.required' => 'Digite o número da prioridade!'
        ];
    }       
}
