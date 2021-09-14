<?php

namespace App\Http\Livewire;

use App\Http\Requests\ParamItemRequest;
use App\Http\Requests\ParamRequest;
use App\Models\Param;
use App\Models\ParamItem;

class LwParams extends CrudComponent
{
    public $params     = [];
    public $paramItems = [];
    public $paramModel;
    public $paramItemModel;
    public $formTitle     = "Lista de parâmetros";
    public $paramId;

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {      
        $this->classNSpace = "App\\Models\\";
        $this->type = 'Param';
        $this->load();
    } 

    public function render()
    {
        return view('livewire.params.lw-params');
    }

    /**
     * Instantiate a new UserController instance.
     */
    public function new($type = null)
    {   
        $this->type = 'Param';
        $this->paramModel     = parent::new($type);
    }   
    
    /**
     * Instantiate a new UserController instance.
     */
    public function newItem($type = null, $id = null)
    {   
        $this->type = 'ParamItem';
        $this->paramItemModel = parent::new($type);

        $this->paramId = $id;
        $this->paramItemModel->param_id = $id;
        $this->paramModel = Param::find($id);
        $this->formTitle      = "Criar novo Item do parametro de " . $this->paramModel->chave;
    }  

    public function edit($id, $type)
    {
            
        switch($type){
            case 'Param':
                $this->paramModel     = parent::edit($id, $type);
                $this->formTitle = "Edição do parametro {$this->paramModel->chave}";
            break;
            case 'ParamItem':
                $this->paramItemModel = parent::edit($id, $type);
                $this->formTitle = "Edição do item  {$this->paramItemModel->conteudo}
                de parametro  {$this->paramItemModel->param->chave}";
            break;                     
        }
    }      
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function rules()
    {
        $srv = null;
        switch($this->type) {
            case 'Param':
                $srv = new ParamRequest();
                $this->messages = $srv->messages();
                return $srv->rules();
            break;
            case 'ParamItem':
                $srv = new ParamItemRequest();
                $this->messages = $srv->messages();
                return $srv->rules();                
            break;                     
        }
    } 
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function load()
    {
        $this->type = 'Param';
        $this->params         = parent::load();
    }  
    
}
