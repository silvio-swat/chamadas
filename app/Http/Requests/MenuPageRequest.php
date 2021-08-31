<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuPageRequest extends FormRequest
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
            'menuPageModel.name'         => 'required|string|min:3',
            'menuPageModel.order'        => 'required|integer|min:1',
            'menuPageModel.icon'         => 'required',
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
            'menuPageModel.name.required' => 'Digite o nome da página',
            'menuPageModel.order.required' => 'Insira um número para ordenar',
            'menuPageModel.icon.required' => 'Selecione um ícone!',
        ];
    }    
}
