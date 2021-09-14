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
    
    public function new($type = null)
    {
        $this->type = $type;
        switch($type) {
            case 'User':
                $this->model = 'userModel';
                $this->formTitle = "Criar novo Usuário";
                $this->userModel = parent::new($type);
            break;
            case 'Role':
                $this->model = 'roleModel';
                $this->formTitle = "Adicionar Papel";
                $this->roleModel = parent::new($type);
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
        $data                           = $this->validate();
        $data['userModel']['password']  = Hash::make($data['password']);
        $isNewUser = !isset($data['userModel']['id']) ? true : false ;
        $user = parent::submit($data['userModel'], $type);
        if(!empty($user) and $isNewUser) {
            $user->attachRole($data['roleId']);
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
    
   /**
     * Adiciona nova Role
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function addRole($role)
    {

    }     

}
