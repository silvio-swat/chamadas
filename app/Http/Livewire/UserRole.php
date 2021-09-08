<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class UserRole extends Component
{
    public $header = "Papeis de Usuários";
    public $roles = [];
    public Role $roleModel;
    protected $rules = [
        'roleModel.name'         => 'required|string|min:3',
        'roleModel.display_name' => 'required|string|min:4',
        'roleModel.description'  => 'string|max:65000',
    ];

    public $search      = null;
    public $modalOpen   = "false";
    public $testeinput  = "Teste de preenchimento de campo";
    public $formTitle;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->roleModel = new Role();
        $this->carregaRoles();
    }   

    public function render()
    {
        return view('livewire.user-roles.lw-user-roles')->layout('layouts.app');
    }

    public function new()
    {
        $this->formTitle = "Criar novo Modal";
        $this->roleModel = new Role();
        $this->modalOpen = "true";
    }     
    
    public function edit($key)
    {
        $this->roleModel = Role::find($key);
        $this->formTitle = "Editação de Papel de {$this->roleModel->name}";
        $this->modalOpen = "true";
    } 

    public function submit($roleModel)
    {
        $this->validate();

        if(!empty($this->roleModel->id)) {
            $this->roleModel->update($roleModel);
        } else {
            $this->roleModel->create($roleModel);
        }
        $this->carregaRoles();
        $this->modalOpen = "false";
    } 
    
    public function setModalClose()
    {
        $this->modalOpen = "false";
    }  
    
    public function carregaRoles()
    {
        $this->roles = Role::all();
    }  

    /**
     * Exclui registro após confirmação
     *
     * @return response()
     */    
    public function deleteConfirm()
    {
        $result = Role::find($this->deleteId)->delete();
        $this->carregaRoles();
        $this->modalDeleteClose();
    } 
    
 

}
