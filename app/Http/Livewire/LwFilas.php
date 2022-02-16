<?php

namespace App\Http\Livewire;

use App\Http\Requests\FilaRequest;
use App\Models\Fila;
use Livewire\WithPagination;

class LwFilas extends CrudComponent
{

    use WithPagination;

    public Fila $filaModel;
    
    public $queryFilas      = [];
    public $filas           = [];
    public $searchTerm      = '';

    public function mount() {
        parent::mount();
        $this->permiComp       = "filas";                   
        $this->filaModel       = new Fila();
        $this->index();
        $this->model           = 'filaModel';
    }    

    public function render()
    {
        return view('livewire.filas.lw-filas');
    }


    public function index()
    {
        $this->type     = 'Fila';
        $this->filas    = parent:: index();
    }  
    
    public function edit($key, $type)
    {
        parent::edit($key, $type);
        $this->formTitle    = "Editação da Fila {$this->filaModel->nome}";
    }     

    // Seta regras de formulario e mensagens
    protected function rules()
    {
        $srv = new FilaRequest();
        $this->messages = $srv->messages();
        return $srv->rules($this->filaModel->id ?? null);
    }     
}
