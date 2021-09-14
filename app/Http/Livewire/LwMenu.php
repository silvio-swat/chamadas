<?php

namespace App\Http\Livewire;

use App\Http\Requests\MenuPageRequest;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\SubMenuRequest;
use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\SubMenu;
use App\Services\Helpers\ImportDataService;
use App\Services\PermissionService;

class LwMenu extends CrudComponent
{
    public    $formTitle;
    protected $service;
    public    $iconsArray          = [];
    public    $selPermissions      = [];
    public    $selectControllers   = [];  

    // Variaveis de Page
    public MenuPage $menuPageModel;
    public $menuPages = [];
    // Variaveis de Menu
    public Menu     $menuModel;
    public $menus = [];
    public $menuPageId;   
    // Variaveis de SubMenu
    public SubMenu  $subMenuModel;
    public $subMenus = [];
    public $menuId; 

    /**
     * Funciona como o construct de cada classe
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */  
    public function mount()
    {
        $this->classNSpace = "App\\Models\\";
        $this->load();
        $this->loadPemissionsSelect();          
        $this->menuPageModel = new MenuPage();
        $this->menuModel     = new Menu();
        $this->subMenuModel  = new SubMenu();
        $inpDataSrv          = new ImportDataService();
        $this->iconsArray    = $inpDataSrv->awesomeIconsArray();
    }   

    /**
     * Renderiza a página conforme a model chamada
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */      
    public function render()
    {
        return view('livewire.menus.lw-menu');
    }

    /**
     * Abre formModel para novo registro
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param int $id
     */     
    public function new($id = null)
    {
        $this->setListClose();

        switch($this->type) {
            case 'MenuPage':
                $this->formTitle = "Criar nova Página de Menu";
                $this->menuPageModel = parent::new($this->type);
            break;
            case 'Menu':
                $this->menuModel     = parent::new($this->type);
                $this->menuModel->menu_page_id = $id;
                $page = MenuPage::find($id);
                $this->formTitle = "Criar Menu para {$page->name}";
            break;
            case 'SubMenu':
                $this->subMenuModel  = parent::new($this->type);
                $this->subMenuModel->menu_id = $id;
                $menu = Menu::find($id);
                $this->formTitle = "Criar Item para {$menu->name} na página {$menu->menuPage->name}";
            break;                        
        }
    }       
    
    /**
     * Abre o form model para edição
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param int $id
     * @param string $type
     */      
    public function edit($id, $type)
    {    
        $this->setListClose();
        switch($type){
            case 'MenuPage':
                $this->menuPageModel = MenuPage::find($id);
                $this->formTitle     = "Edição da Página {$this->menuPageModel->name}";
            break;
            case 'Menu':
                $this->menuModel = Menu::find($id);
                $this->formTitle = "Edição de Menu de {$this->menuModel->name}
                da página {$this->menuModel->menuPage->name}";
            break;
            case 'SubMenu':
                $this->subMenuModel = SubMenu::find($id);
                $this->formTitle    = "Edição de {$this->subMenuModel->name}
                do menu {$this->subMenuModel->menu->name} da página 
                {$this->subMenuModel->menu->menuPage->name}";
            break;                        
        }
        $this->modalForm = $type;
    } 
    
    /**
     * Carrega os dados de listagem de cada tipo de menus
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */      
    public function load() {
        //Carrega dados de Páginas de Menu
        $this->menuPages = MenuPage::orderBy('order', 'ASC')->get();
        // Se existir id carrega dados de menu conforme página clicada
        if($this->menuPageId) {
            $menuPageM = MenuPage::find($this->menuPageId);
            $this->menus = $menuPageM->menus->sortBy(
                function($menu) {
                return $menu->order;
            });           
        } 
        // Se existir id carrega array de SubMenus conforme menu clicado
        if($this->menuId) {
            $menuM = Menu::find($this->menuId);
            $this->subMenus = $menuM->subMenus->sortBy(
                function($subMenu) {
                return $subMenu->order;
            });           
        } 
    }
    
    /**
     * Abre modal de listagem de cada um dos tipos de model
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param string $type
     * @param int $id
     */      
    public function list($type, $id = null)
    {
        $this->type      = $type;
        
        switch($type){
            case 'MenuPage':
                $this->formTitle         = "Lista de páginas de menu";
            break;
            case 'Menu':
                $this->menuPageId = $id ? $id : $this->menuPageId;
                $this->formTitle         = "Lista de menus da página";
            break;
            case 'SubMenu':
                $this->menuId = $id ? $id : $this->menuId;
                $this->formTitle         = "Lista de SubMenus do Menu";
            break;     
            case 'Icons':
                $this->formTitle         = "Lista de Icones";
            break;                                
        }
        $this->modalList = $type;        
        $this->load();
    }
    

    /**
     * Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */     
    protected function rules()
    {
        $srv = null;
        switch($this->type) {
            case 'MenuPage':
                $srv = new MenuPageRequest();
                $this->messages = $srv->messages();
                return $srv->rules();
            break;
            case 'Menu':
                $srv = new MenuRequest();
                $this->messages = $srv->messages();
                return $srv->rules();                
            break;
            case 'SubMenu':
                $srv = new SubMenuRequest();
                $this->messages = $srv->messages();
                return $srv->rules();                
            break;                        
        }
    }  

    /**
     * Carrega o array para o Select de permissions
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */     
    public function loadPemissionsSelect()
    {
        $permissionSrv           = new PermissionService();
        $this->selPermissions    = $permissionSrv->getPermissionSelectArray();
        $this->selectControllers = $this->param->getSelectArray('ctr_comp');
    }
    
    /**
     * Armazeona o id para executar exclusão caso confirmado
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */ 
    public function delete($key , $type = null)
    {
        $this->setListClose();
        parent::delete($key, $type);
    } 
     
}
