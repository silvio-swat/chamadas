<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParamItemRequest extends FormRequest
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
            'paramItemModel.conteudo'    => 'required|string|min:3',
            'paramItemModel.descricao'   => '',
            'paramItemModel.param_id'    => 'required',
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'paramItemModel.conteudo.required'  => 'Digite o conteudo',
        ];
    }     
}
