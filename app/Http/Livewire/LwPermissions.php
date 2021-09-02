<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Services\Helpers\ParametrosService;
use App\Services\Menu\MenuPageService;
use App\Services\Menu\MenuService;
use Livewire\Component;

class LwPermissions extends Component
{
    public $header = "Permissões de acesso de recursos do sistema";
    public $permissions = [];
    public $selectTipos = [];
    public $selectMenus = [];
    public $selectControllers = [];
    public Permission $permissionModel;
    protected $rules = [
        'permissionModel.name'         => 'required|string|min:3',
        'permissionModel.display_name' => 'required|string|min:4',
        'permissionModel.description'  => '',
        'permissionModel.type'         => 'required|string|min:2',
        'permissionModel.menu'         => '',
        'permissionModel.controller'   => '',
        'permissionModel.method'       => '',
    ];

    public $search = null;
    public $modalOpen = "false";
    public $formTitle;    

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {
        $this->permissionModel = new Permission();
        $this->carregaPermissions();
    }       

    public function render()
    {
        return view('livewire.permissions.lw-permissions');
    }

    public function delete($key)
    {
        $result = Permission::find($key)->delete();
        $this->carregaPermissions();
    }   
    
    public function new()
    {
        $this->carregaSelect();
        $this->formTitle = "Criar nova permissão";
        $this->permissionModel = new Permission();
        $this->setModalOpen();
    }     
    
    public function edit($key)
    {
        $this->permissionModel = Permission::find($key);
        $this->formTitle = "Editação de Permissão {$this->permissionModel->display_name}";
        $this->setModalOpen();
    } 

    public function submit($permissionModel)
    {
        $this->validate();

        if(!empty($this->permissionModel->id)) {
            $this->permissionModel->update($permissionModel);
        } else {
            $this->permissionModel->create($permissionModel);
        }

        $this->carregaPermissions();
        $this->modalOpen = "false";
    } 
    
    public function setModalClose()
    {
        $this->modalOpen = "false";
    }  

    public function setModalOpen()
    {
        $this->modalOpen = "true";
    }      
    
    public function carregaPermissions()
    {
        $this->permissions = Permission::all();
    }    
    

    public function carregaSelect()
    {
        $param = new ParametrosService();
        $this->selectTipos = $param->getSelectArray('permissionsType');
        $menuPageSrv= new MenuPageService();
        $this->selectMenus = $menuPageSrv->getSelectMenusArray();

    }        
    





}
