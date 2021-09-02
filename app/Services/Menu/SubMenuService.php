<?php
namespace App\Services\Menu;

class SubMenuService
{
    public function getSelectMenusArray($selectArray, $subMenus){

        if(count($subMenus) > 0){
            foreach($subMenus as $subMenu){
                $selectArray[] = [
                    'value'  => $subMenu->menu->menuPage->name  . "/" . $subMenu->menu->name  . "/" . $subMenu->name,
                    'descri' => $subMenu->menu->menuPage->name  . "/" . $subMenu->menu->name  . "/" . $subMenu->name,
               ];
            }
        } 

        return $selectArray;
    } 
}