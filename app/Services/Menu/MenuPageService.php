<?php
namespace App\Services\Menu;

use App\Models\MenuPage;


class MenuPageService
{
    private $srvMenu;

    public function __construct() {
        $this->srvMenu    = new MenuService();
    }

    public function getSelectMenusArray(){
        $selectArray = [];
        $pages = MenuPage::all();

        if(count($pages) > 0){
            foreach($pages as $page){
                $selectArray[] = [
                     'value'  => $page->name,
                     'descri' => $page->name
                ];
                $selectArray = $this->srvMenu->getSelectMenusArray($selectArray, $page->menus);
            }
        } else {
            $selectArray = [
                'value'  => null,
                'descri' => 'nenhum item encontrado'
           ];            
        }
        sort($selectArray);

        return $selectArray;
    }  


}