<?php

namespace App\Http\Livewire;

use App\Models\Role;

class UserRole extends CrudComponent
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
    public function mount()
    {
        parent::mount(); 
        $this->permiComp       = "user-roles";                 
        $this->type = 'Role';
        $this->index();
    }   

    public function render()
    {
        return view('livewire.user-roles.lw-user-roles');
    }

    public function new($type = null)
    {
        $this->formTitle = "Criar novo Modal";
        $this->roleModel = parent::new($type);
    }     
    
    public function edit($key, $type)
    {
        $this->roleModel = parent::edit($key, $type);
        $this->formTitle = "Editação de Papel de {$this->roleModel->name}";
    }
    
    public function index()
    {
        $this->roles = parent:: index();
    }  

}
