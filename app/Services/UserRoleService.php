<?php
namespace App\Services;

use App\Models\Role;

class UserRoleService
{

    public function __construct()
    {
    }    

    public function getRoleSelectArray(){
        $selectArray = [];
        $roles = Role::all();
        if(count($roles) > 0){
            $selectArray[]     = ['value'  => "",
                                  'descri' => 'Selecione um papel'];
            foreach($roles as $item){
                $selectArray[] = [
                     'value'  => $item->id,
                     'descri' => $item->display_name
                ];
            }
        } else {
            $selectArray = [
                'value'  => "",
                'descri' => 'nenhum item encontrado'
           ];            
        }
        return $selectArray;
    }      

}