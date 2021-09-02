<?php
namespace App\Services\Menu;

use App\Models\Menu;

class MenuService
{
    private $srvSubMenu;    

    public function __construct() {
        $this->srvSubMenu = new SubMenuService();
    }

    public function getSelectMenuArray($selectArray = [], $menus){

        if(count($menus) > 0){
            foreach($menus as $menu){
                $selectArray[] = [
                    'value'  => $menu->menuPage->name  . "/" . $menu->name,
                    'descri' => $menu->menuPage->name  . "/" . $menu->name,
               ];
               $selectArray = $this->srvSubMenu->getSelectSubArray($selectArray, $menu->subMenus);
            }
        } 

        return $selectArray;
    }     
}