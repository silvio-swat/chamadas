<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserRoleService;
use Illuminate\Support\Facades\Hash;

class LwUser extends CrudComponent
{
    public $users = [];
    public User $userModel;
    public Role $roleModel;
    public $password_confirmation;
    public $password;
    public $roleId;
    public $selectRoles = []; 
    public $strRoles; 

    public function render()
    {
        return view('livewire.users.lw-user');
    }

    public function mount() {
        $this->type = 'User';
        $this->load();
        $this->loadSelects();
        $this->model = 'userModel';
    }

    public function load()
    {
        $this->users = parent::load();
    }
    
    public function new($type = null, $id = null)
    {
        $this->type = $type;
        switch($this->type ) {
            case 'User':
                $this->model = 'userModel';
                $this->formTitle = "Criar novo Usuário";
                $this->userModel = parent::new($type);                
            break;
            case 'Role':
                $this->model = 'roleModel';
                $this->formTitle = "Adicionar Papel";
                $this->roleModel = parent::new($type);
                $this->userModel = User::find($id);          
            break;            
        }
    }     
    
    public function edit($key, $type)
    {
        $this->userModel = parent::edit($key, $type);
        $this->formTitle = "Editação de Usuario{$this->userModel->name}";
    } 
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function rules()
    {
        $srv = null;
        $srv = new UserRequest();
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
        switch($this->type) {
            case 'User':
                $data                           = $this->validate();
                $data['userModel']['password']  = Hash::make($data['password']);
                $isNewUser = !isset($data['userModel']['id']) ? true : false ;
                $user = parent::submit($data['userModel'], $type);
                if(!empty($user) and $isNewUser) {
                    $user->attachRole($data['roleId']);
                }             
            break;
            case 'Role':
                $this->roleModel = Role::find($this->roleId);
                $this->userModel->attachRole($this->roleModel);
                $this->setFormClose();
                $this->load();
            break;            
        }
        

    } 

   /**
     * Carrega Selects
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function loadSelects()
    {
        $srv               = new UserRoleService();
        $this->selectRoles = $srv->getRoleSelectArray();
    }    

}
