<?php

namespace App\Http\Livewire;

use App\Http\Requests\RolePermission;
use App\Models\Permission;
use App\Models\Role;
use App\Services\PermissionService;
use App\Services\UserRoleService;
use Exception;

class LwRolesPermissions extends CrudComponent
{

    public Role         $roleModel;
    public Permission   $permissionModel;
    public $selectRoles       = []; 
    public $selectPermissions = []; 
    public $roles             = []; 

    public function render()
    {
        return view('livewire.roles-permissions.lw-roles-permissions');
    }

    public function mount() {
        parent::mount(); 
        $this->permiComp       = "roles-permissions";        
        $this->roleModel       = new Role();
        $this->permissionModel = new Permission();
        $this->index();
        $this->loadSelects();
        $this->model = 'permissionModel';
    }

    public function index()
    {
        $this->type     = 'Role';
        $this->roles    = parent:: index();
    }
    
    public function new($type = null, $id = null)
    {
        $this->type             = 'Permission';
        $this->model            = 'permissionModel';
        $this->permissionModel  = parent::new($type);
        $this->roleModel        = Role::find($id);
        $this->formTitle        = "Vincular Papel com permissão";
    }     
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function rules()
    {
        $srv = new RolePermission();
        $this->messages = $srv->messages();
        return $srv->rules();
    }     

   /**
     * Salva a model conforme o tipo editado ou criado
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param model $model
     */       
    public function submit($model, $type)
    {
        $this->insertPermission($model['id']);
        $this->setFormClose();
        $this->index();
    } 

   /**
     * Adiciona permissão ao papel de usuários
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function insertPermission($id)
    {
        $error = false;
        try {
            $this->roleModel->attachPermission($id);
        } catch(Exception $e) {
            $error = true;
        }
        if(!$error){
            $this->alert('success', 'Permissão adicionada com sucesso!');
        } else {
            $this->alert('error', "Permissão já foi adicionada ao papel!");
        }
    }      

   /**
     * Carrega Selects
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function loadSelects()
    {
        $roleSrv                 = new UserRoleService();
        $this->selectRoles       = $roleSrv->getRoleSelectArray();
        $permissionSrv           = new PermissionService();
        $this->selectPermissions = $permissionSrv->getPermissionSelectArray();        
    }    

    public function deleteConfirm()
    {
        $this->roleModel        = Role::find($this->deleteId['pivot']['role_id']);
        $this->roleModel->detachPermission($this->deleteId['pivot']['permission_id']);
        $this->index();
        $this->modalDeleteClose();
        $this->alert('success', 'Excluído com sucesso');
    }  
    
}
