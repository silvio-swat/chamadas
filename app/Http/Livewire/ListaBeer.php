<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class ListaBeer extends Component
{
    public $roles = [];

    public $username = null;
    public $nomes = 'Silvio, Augusto, George';
    public $item;
    public $key = null;
    public $acao = 'cadastrar';  

    public $listaNomes = ['Silvio', 'Augusto', 'George', 'Caio']; 
    
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->roles = Role::all();
    }          

    public function render()
    {
        return view('livewire.lista-beer')->layout('layouts.app');
    }


    public function add()
    {
        if($this->acao == 'editar') {
            // $this->listaNomes[$this->key] = $this->item;

            $this->listaNomes = array_replace($this->listaNomes, [
                $this->key => $this->item
            ]);
            $this->key = null;
        } else {
            array_unshift($this->listaNomes, $this->item);
        }
        $this->acao = 'cadastrar';        
 
        $this->item = null;
    }    


    public function resetList()
    {
        unset($this->listaNomes);
        $this->listaNomes = [];
    }     

    public function delete($key)
    {
        unset($this->listaNomes[$key]);
    }       
    
    public function edit($key)
    {
        $this->item = $this->listaNomes[$key];
        $this->key  = $key;
        $this->acao = 'editar';
    }   

    public function search()
    {
        ddd($this->username);
    }  


    public function deleteR($key)
    {
        dd('teste delete');
        $result = Role::find($key)->delete();
        $this->roles = Role::all();

    }       
    
    public function editR($key)
    {
        dd('teste edit');
        $this->item = $this->listaNomes[$key];
        $this->key  = $key;
        $this->acao = 'editar';
    } 
    
    public function testeR()
    {
        dd('teste edit');

    }          
    
    
}
