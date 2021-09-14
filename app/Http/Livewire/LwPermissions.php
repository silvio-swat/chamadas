<?php

namespace App\Http\Livewire;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Services\PermissionService;

class LwPermissions extends CrudComponent
{
    public   $header = "Permissões de acesso de recursos do sistema";
    public   $permissions       = [];
    public   $selectTipos       = [];
    public   $selectMenus       = [];
    public   $selectControllers = [];
    public   Permission $permissionModel;

    public $search = null;

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {
        $this->classNSpace = "App\\Models\\";
        $this->loadSelects();
        $this->permissionModel = new Permission();
        $this->type = 'Permission';
        $this->load();
    }       

    public function render()
    {
        return view('livewire.permissions.lw-permissions');
    }

    /**
     * Instancia uma classe para um novo form
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */      
    public function new($type = null)
    {
        $this->permissionModel = parent::new($type);
    }        

    public function edit($key, $type)
    {
        $this->permissionModel = parent::edit($key, $type);
        $this->formTitle       = "Editação de Permissão {$this->permissionModel->display_name}";
    } 

    public function submit($model, $type)
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
        // Valida os campos menu e controller
        if($model['type'] == 'menu' && !$model['menu'] ){
            $this->alert('error', 'Selecione um Menu');  
        }
        if($model['type'] != 'menu' && !$model['controller'] ){
            $this->alert('error', 'Selecione um Controller ou Menu');  
        }        

        parent::submit($model, $type);
        $this->load();
    } 
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function load()
    {
        $this->permissions         = parent::load();
    }   

    public function loadSelects()
    {
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
