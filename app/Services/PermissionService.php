<?php
namespace App\Services;

use App\Models\Permission;
use App\Services\Helpers\ParametrosService;

class PermissionService
{
    protected $param;

    public function __construct()
    {
        $this->param = new ParametrosService();
    }    

    public function buildDisplayName($permissionModel, $selectTipos, $selectMenus, $selectControllers) {
        $displayType = $this->param->getDisplayName($selectTipos, $permissionModel->type);
        $displayMenu = $this->param->getDisplayName($selectMenus, $permissionModel->menu);
        $displayCtr  = $this->param->getDisplayName($selectControllers, $permissionModel->controller);

        return $displayType  . ": " . $displayMenu . $displayCtr;
    }

    public function getPermissionSelectArray(){
        $selectArray = [];
        $permissions = Permission::all();
        if(count($permissions) > 0){
            $selectArray[] = ['value'  => "",
                              'descri' => 'Selecione uma permissão'];
            foreach($permissions as $item){
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