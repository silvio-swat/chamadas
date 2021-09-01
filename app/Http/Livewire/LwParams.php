<?php

namespace App\Http\Livewire;

use App\Http\Requests\ParamItemRequest;
use App\Http\Requests\ParamRequest;
use App\Models\Param;
use App\Models\ParamItem;
use Livewire\Component;

class LwParams extends Component
{
    public $rules    = [];
    public $messages = [];
    public $params = [];
    public $paramItems = [];
    public $paramModel;
    public $paramItemModel;
    public $modalOpen = "false";
    public $modalItemOpen = "false";
    public $formTitle = "Lista de parâmetros";
    public $paramId;
    public $opened;

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {      
        $this->carregaDados('param');
        $this->paramModel     = new Param();
        $this->paramItemModel = new ParamItem();
    } 

    public function render()
    {
        return view('livewire.params.lw-params');
    }

    /**
     * Instantiate a new UserController instance.
     */
    public function new()
    {      
        $this->opened = 'param';
        $this->formTitle  = "Criar novo parametro";
        $this->setModalOpen('param');
    }   
    
    /**
     * Instantiate a new UserController instance.
     */
    public function newItem($id)
    {     
        $this->paramId = $id;        
        $this->opened = 'paramItem'; 
        $this->formTitle      = "Criar novo Item";
        $this->paramItemModel->param_id = $id;
        $this->setModalOpen('paramItem');
        $this->setModalClose('param');
    }  
    
    public function edit($id, $type)
    {
        $this->opened = $type;        
        switch($type){
            case 'param':
                $this->paramId = $id;
                $this->paramModel = Param::find($id);
                $this->formTitle = "Edição do parametro {$this->paramModel->chave}";
                $this->modalOpen = "true";
            break;
            case 'paramItem':
                $this->paramItemModel = ParamItem::find($id);
                $this->formTitle = "Edição do item  {$this->paramModel->name}
                de parametro  {$this->paramItemModel->param->chave}";
                $this->modalItemOpen = "true";
                $this->setModalClose('param');
            break;                     
        }
    }     

    /**
     * Instantiate a new UserController instance.
     */
    public function setModalClose($type)
    {      
        switch($type) {
            case 'param':
                $this->modalOpen = "false";
            break;
            case 'paramItem':
                $this->modalItemOpen = "false";
            break;            
        }
    }      

    /**
     * Instantiate a new UserController instance.
     */
    public function setModalOpen($type)
    {      
        switch($type) {
            case 'param':
                $this->modalOpen = "true";
            break;
            case 'paramItem':
                $this->modalItemOpen = "true";
            break;            
        }
    } 
    
    /**
     * Mensagem de toast
     * @param string $type
     * @param string $msg
     * @return response()
     */
    public function alert($type, $msg)
    {
        $this->dispatchBrowserEvent('alert', 
                ['type' => $type,  'message' => $msg]);
    } 
    
    
    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function rules()
    {
        $srv = null;
        switch($this->opened) {
            case 'param':
                $srv = new ParamRequest();
                $this->messages = $srv->messages();
                return $srv->rules();
            break;
            case 'paramItem':
                $srv = new ParamItemRequest();
                $this->messages = $srv->messages();
                return $srv->rules();                
            break;                     
        }
    } 
    
    public function submit($model, $type)
    {
        $this->validate();
        if(isset($model['id'])) {
            switch($type){
                case 'param':
                    $this->paramModel->update($model);
                break;
                case 'paramItem':
                    $this->paramItemModel->update($model);
                break;                        
            }
        } else {
            switch($type){
                case 'param':
                    $this->paramModel->create($model);
                break;
                case 'paramItem':
                    $this->paramItemModel->create($model);
                    $this->setModalOpen('param');
                    $this->carregaDados('param'); 
                break;                        
            }            
        }

        $this->carregaDados($type);        
        $this->setModalClose($type);
        $this->alert('success', 'Salvo com sucesso');  
    }     

    // Seta regras de formulario conforme lista e form new ou edit clicados por conseguinte
    protected function carregaDados($type)
    {
        switch($type) {
            case 'param':
                $this->params         = Param::all();
                break;
            case 'paramItem':
                $this->paramItems     = ParamItem::all();
                    
            break;                     
        }
    }     
}
