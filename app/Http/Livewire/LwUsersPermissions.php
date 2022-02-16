<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserPermission;
use App\Models\Permission;
use App\Models\User;
use App\Services\PermissionService;
use App\Services\UserRoleService;
use Exception;

class LwUsersPermissions extends CrudComponent
{

    public User               $userModel;
    public Permission         $permissionModel;
    public $selectUsers       = [];
    public $selectPermissions = [];
    public $users             = [];

    public function render()
    {
        return view('livewire.users-permissions.lw-users-permissions');
    }

    public function mount() {
        parent::mount();
        $this->permiComp       = "users-permissions";
        $this->userModel       = new User();
        $this->permissionModel = new Permission();
        $this->index();
        $this->loadSelects();
        $this->model           = 'permissionModel';
    }

    public function index()
    {
        $this->type     = 'User';
        $this->users    = parent:: index();
    }
    
    public function new($type = null, $id = null)
    {
        $this->type             = 'Permission';
        $this->model            = 'permissionModel';
        $this->permissionModel  = parent::new($type);
        $this->userModel        = User::find($id);
        $this->formTitle        = "Vincular Papel com permissão";
    }

    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function rules()
    {
        $srv = new UserPermission();
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
        $this->insertPermission($model['id'] ?? 0);
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
            $this->userModel->attachPermission($id);
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
        $this->selectUsers       = $roleSrv->getRoleSelectArray();
        $permissionSrv           = new PermissionService();
        $this->selectPermissions = $permissionSrv->getPermissionSelectArray();        
    }    

    public function deleteConfirm()
    {
        $this->userModel        = User::find($this->deleteId['pivot']['user_id']);
        $this->userModel->detachPermission($this->deleteId['pivot']['permission_id']);
        $this->index();
        $this->modalDeleteClose(); 
        $this->alert('success', 'Excluído com sucesso');        
    }      
}
