<?php
namespace App\Services;

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

}