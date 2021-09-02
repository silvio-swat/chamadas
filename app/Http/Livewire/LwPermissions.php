<?php

namespace App\Http\Livewire;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Services\Helpers\ParametrosService;
use App\Services\PermissionService;

class LwPermissions extends CrudComponent
{
    public $header = "Permissões de acesso de recursos do sistema";
    public $permissions       = [];
    public $selectTipos       = [];
    public $selectMenus       = [];
    public $selectControllers = [];
    public Permission $permissionModel;
    protected $rules   = [];
    protected $message = [];

    public $search = null;
    public $modalOpen = "false";
    public $formTitle;

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {
        $this->param = new ParametrosService();           
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
        $this->alert('success', 'Excluído com sucesso');
    }   
    
    public function new()
    {
        $this->carregaSelects();
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

    public function submit($model)
    {   
        // Preenche o name acl aplicavel
        $this->permissionModel->name = $this->permissionModel->type . ":" .
            $this->permissionModel->controller . $this->permissionModel->menu;
        $model['name'] = $this->permissionModel->name;

        // Preenche display name para leitura amigável da acl
        $permitionSrv = new PermissionService();
        $this->permissionModel->display_name = $permitionSrv->buildDisplayName($this->permissionModel,
            $this->selectTipos, $this->selectMenus, $this->selectControllers);
        $model['display_name'] = $this->permissionModel->display_name;

        $this->validate();

        if(!empty($this->permissionModel->id)) {
            $this->permissionModel->update($model);
        } else {
            $this->permissionModel->create($model);
        }

        $this->carregaPermissions();
        $this->modalOpen = "false";
        $this->alert('success', 'Salvo com sucesso'); 

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

    public function carregaSelects()
    {
        // $param = new ParametrosService();
        $this->selectTipos       = $this->param->getSelectArray('permissionsType');
        $this->selectControllers = $this->param->getSelectArray('ctr_comp');
        $this->selectMenus       = $this->param->getSelectMenusArray();
    }        

    // Seta regras de formulario e mensagens
    protected function rules()
    {
        $srv = new PermissionRequest();
        $this->messages = $srv->messages();
        return $srv->rules();    
    } 

}
