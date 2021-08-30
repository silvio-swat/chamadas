<?php
namespace App\Services\Menu;

class MenuPageService
{
    private $formRulesLw = [
        'menuPageModel.name'         => 'required|string|min:3',
        'menuPageModel.order'        => 'required|integer|min:1',
        'menuPageModel.icon'         => 'required',
    ];

    public function getFormRulesLw(){
        return $this->formRulesLw;
    }
}