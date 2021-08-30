<?php
namespace App\Services\Menu;

class SubMenuService
{
    public function getFormRulesLw(){
        return [
            'subMenuModel.name'         => 'required|string|min:3',
            'subMenuModel.controller'   => 'required|string|min:3',
            'subMenuModel.action'       => '',            
            'subMenuModel.menu_id'      => 'required',
            'subMenuModel.order'        => 'required|integer|min:1',
            'subMenuModel.icon'         => 'required',
        ];
    }
}