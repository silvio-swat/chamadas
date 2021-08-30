<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class Roles extends Component
{
    public $roles = [];
    public $search = null;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->roles = Role::all();
    }      

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.roles');
    }

    public function delete($key)
    {
        dd('teste delete');
        $result = Role::find($key)->delete();
        $this->roles = Role::all();
    }       
    
    public function edit($key)
    {
        dd('teste edit');
        $this->item = $this->listaNomes[$key];
        $this->key  = $key;
        $this->acao = 'editar';
    }  

}
