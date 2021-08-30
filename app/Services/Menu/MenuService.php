<?php
namespace App\Services\Menu;

class MenuService
{
    public function getFormRulesLw(){
        return [
            'menuModel.name'         => 'required|string|min:3',
            'menuModel.order'        => 'required|integer|min:1',
            'menuModel.menu_page_id' => 'required',
            'menuModel.icon'         => 'required',
        ];
    }
}