<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\SubMenu;

class LwMenu extends Component
{

    public $header = "Papeis de Usuários";
    public $menuPages = [];
    public $menus = [];
    public $Submenus = [];
    public MenuPage $menuPageModel;
    public Menu     $menuModel;
    public SubMenu  $subMenuModel;
    protected $rules = [
        'menuPageModel.name'         => 'required|string|min:3',
        'menuPageModel.order'        => 'required|integer|min:1',
    ];

    public $modalOpen = "false";
    public $formTitle;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->menuPageModel = new MenuPage();
        $this->menuModel     = new Menu();
        $this->subMenuModel  = new SubMenu();
        $this->carregaMenuPages();
    }   

    public function render()
    {
        return view('livewire.lw-menu')->layout('layouts.app');
    }

    public function delete($key)
    {
        $result = MenuPage::find($key)->delete();
        $this->carregaMenuPages();
    }   
    
    public function new()
    {
        $this->formTitle = "Criar nova Página de Menu";
        $this->menuPageModel = new MenuPage();
        $this->modalOpen = "true";
    }     
    
    public function edit($key)
    {
        $this->menuPageModel = MenuPage::find($key);
        $this->formTitle = "Editação de Página de {$this->menuPageModel->name}";
        $this->modalOpen = "true";
    } 

    public function submit($menuPageModel)
    {
        // $this->validate();

        if(!empty($this->menuPageModel->id)) {
            $this->menuPageModel->update($menuPageModel);
        } else {
            $this->menuPageModel->create($menuPageModel);
        }
        $this->carregaMenuPages();
        $this->modalOpen = "false";
    } 
    
    public function setModalClose()
    {
        $this->modalOpen = "false";
    }  
    
    public function carregaMenuPages()
    {
        $this->menuPages = MenuPage::all();
    }   

}
