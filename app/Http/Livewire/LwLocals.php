<?php

namespace App\Http\Livewire;

use App\Http\Requests\LocalFilaRequest;
use App\Http\Requests\LocalRequest;
use App\Models\Fila;
use App\Models\Local;
use App\Services\Helpers\ParametrosService;
use Exception;
use Livewire\WithPagination;

class LwLocals extends CrudComponent
{
    use WithPagination;

    public Local      $localModel;
    public Fila       $filaModel;
    public $queryLocals      = [];
    public $locals           = [];
    public $searchTerm       = '';
    public $selectFilas      = [];
    public $filaEnc;

    public function render()
    {
        return view('livewire.locals.lw-locals');
    }

    public function mount() {
        parent::mount();
        $this->permiComp       = "locals";                   
        $this->localModel      = new Local();
        $this->filaModel       = new Fila();
        $this->model           = 'localModel';
        $this->index();
        $this->loadSelects();
    }      

    public function index()
    {
        $this->type      = 'Local';
        $this->locals    = parent:: index();
    }  
    
    public function edit($key, $type)
    {
        parent::edit($key, $type);
        $this->formTitle    = "Edição de Local {$this->localModel->nome}";
    }     

   /**
     * Carrega Selects
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function loadSelects()
    {
        $srv               = new ParametrosService();
        $this->selectFilas = $srv->getSelectFilas();
    }
    
    public function new($type = null, $id = null, $filaType = null)
    {
        $this->type = $type ?? $this->type;
        switch($this->type ) {
            case 'Local':
                $this->model = 'localModel';
                $this->formTitle = "Criar um novo local";
                $this->localModel = parent::new($type);
            break;
            case 'Fila':
                if($filaType == 'enc'){
                    $this->trataFilaDeEncaminhamento($id);
                } else {
                    $this->model      = 'filaModel';
                    $this->filaModel  = parent::new($type);
                    $this->formTitle  = "Adicionar Fila de Espera";
                    $this->localModel = Local::find($id);
                    $this->filaEnc = false;
                }
                $this->type           = "Fila";                
            break;
        }

        $this->rules();
    }  

    // Seta regras de formulario e mensagens
    protected function trataFilaDeEncaminhamento($id)
    {
        $this->formTitle      = "Adicionar Fila de Encaminhamento";
        $this->type           = 'FilaEnc';
        $this->filaModel      = new Fila();
        $this->modalForm      = "Fila";
        $this->setFormOpen();
        $this->localModel     = Local::find($id);
        $this->filaEnc        = true;     
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
            case 'Local':
                parent::submit($model, $type);
            break;
            case 'Fila':
                $this->filaModel = Fila::find($model['id']);
                // adiciona a Role no Usuário
                $this->insertFila();
                $this->setFormClose();
                $this->index();
            break;            
            $this->type = 'Local';
        }
    }   
    
    // Seta regras de formulario e mensagens
    protected function rules()
    {
        $srv = null;
        switch($this->type) {
            case 'Local':
                $srv = new LocalRequest();
                $this->messages = $srv->messages();
                return $srv->rules($this->localModel->id ?? null);
            break;
            case 'Fila':
                return [
                    'filaModel.id' => 'required'
                ];
            break;
        }        
    }   
    
   /**
     * Adiciona nova fila de espera
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */       
    public function insertFila()
    {
        $error = false;
        try {
            if($this->filaEnc == 'enc') {
                $this->localModel->filaEncs()->attach($this->filaModel);
            } else {
                $this->localModel->filas()->attach($this->filaModel);                
            }
        } catch(Exception $e) {
            $error = true;
        }
        if(!$error){
            $this->alert('success', 'Fila de espera adicionada com sucesso!');
        } else {
            $this->alert('error', "Fila de espera  já foi adicionada!");
        }
    }    
    
    /**
     * Armazeona o id para executar exclusão caso confirmado
     *
     * @return response()
     */
    public function delete($id, $type, $filaEnc = null)
    {
        $this->type         = $type;
        $this->filaEnc      = $filaEnc;
        switch($type) {
            case 'Local':
                parent::delete($id, $type);
            break;
            case 'Fila':
                if($this->filaEnc) {
                    $this->localModel   = Local::find($id['pivot']['fila_encable_id']);
                } else {
                    $this->localModel   = Local::find($id['pivot']['filaable_id']);
                }
                $this->filaModel    = Fila::find($id['pivot']['fila_id']);
                $this->modalDelete  = "true";
            break;
        }        
    }     

    public function deleteConfirm()
    {
        switch($this->type) {
            case 'Local':
                parent::deleteConfirm();
            break;
            case 'Fila':
                if($this->filaEnc) {
                    $this->localModel->filaEncs()->detach($this->filaModel);
                } else {
                    $this->localModel->filas()->detach($this->filaModel);
                }
                $this->type = 'Local';
                $this->index();
                $this->modalDeleteClose(); 
                $this->alert('success', 'Excluído com sucesso');
            break;        
        }
    }      


}
