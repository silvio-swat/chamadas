<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subMenuModel.name'           => 'required|string|min:3',
            'subMenuModel.controller'     => 'required|string|min:3',
            'subMenuModel.action'         => '',            
            'subMenuModel.menu_id'        => 'required',
            'subMenuModel.order'          => 'required|integer|min:1',
            'subMenuModel.icon'           => 'required',
            'subMenuModel.permission_id'  => '',            

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
            'subMenuModel.name.required'        => 'Digite o nome do Item de menu',
            'subMenuModel.controller.required'  => 'Digite o Controller ou component livewire',
            'subMenuModel.order.required'       => 'Insira um número para ordenar',
            'subMenuModel.icon.required'        => 'Selecione um ícone!',
        ];
    }     
}
