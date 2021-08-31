<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'menuModel.name'         => 'required|string|min:3',
            'menuModel.order'        => 'required|integer|min:1',
            'menuModel.menu_page_id' => 'required',
            'menuModel.icon'         => 'required',
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
            'menuModel.name.required'  => 'Digite o nome do Menu',
            'menuModel.order.required' => 'Insira um número para ordenar',
            'menuModel.icon.required'  => 'Selecione um ícone!',
        ];
    }      
}
