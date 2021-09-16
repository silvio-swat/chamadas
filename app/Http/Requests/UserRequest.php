<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'userModel.name'                  => 'required|string|max:255',
            'userModel.email'                 => 'required|string|email|max:255|unique:users,email',
            'password'                        => 'required|string|min:8|confirmed',
            'userModel.is_admin'              => '',
            'roleModel.id'                    => 'required'
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
            'userModel.name.required'       => 'Digite o Nome',
            'userModel.email.required'      => 'Digite o Email',
            'roleId.required'               => 'Selecione um papel'
        ];
    }      
}
