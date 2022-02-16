<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            'localModel.nome'                => 'required|string|min:3|unique:locals,nome,',
            'localModel.rotulo'              => 'required',
            'localModel.fila_id'             => 'required',
        ];
        if(!empty($id)){
            $valArray['localModel.nome'] = ['required', 'string', Rule::unique('locals', 'nome')->ignore($id)];
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
            'localModel.nome.required'       => 'Digite o nome!',
            'localModel.nome.unique'         => 'Local já cadastrado, Tente outro nome!',
            'localModel.rotulo.required'     => 'Digite o rótulo do local!',
            'localModel.fila_id.required'    => 'Selecione uma fila padrão!'
        ];
    }        
}
