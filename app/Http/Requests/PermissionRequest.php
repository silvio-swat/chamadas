<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        return  [
            'permissionModel.name'         => 'required|unique:permissions,name,',
            'permissionModel.display_name' => 'required|string|min:4',
            'permissionModel.description'  => '',
            'permissionModel.type'         => 'required|string|min:2',
            'permissionModel.menu'         => '',
            'permissionModel.controller'   => '',
            'permissionModel.method'       => '',
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
            'permissionModel.type.required'  => 'Selecione o Tipo',
            'permissionModel.name.required'  => 'Escolha um controller ou menu',
            'permissionModel.name.unique'    => 'Permissão já cadastrada, localize na lista'
        ];
    }        
}
