<?php

namespace App\Http\Livewire;

use App\Services\Helpers\ParametrosService;
use App\Services\Helpers\ViewHelperService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrudComponent extends Component
{
    public    $user;
    public    $permiComp;
    public    $modalDelete         = 'false';
    public    $formTitle;
    public    $deleteId;
    public    $type                = null; 
    public    $classNSpace;
    public    $modalForm           = null;
    public    $modalList           = null;
    public    $header              = null;
    public    $models              = [];  
    public    $model;
    public    $lambda;
    public    $acao;
    protected $param;
    protected $rules               = [];
    protected $messages            = []; 
    protected $viewHelper;


    public function mount()
    {       
        $this->classNSpace = "App\\Models\\";
        $this->param       = $this->getParametrosService();
        $this->viewHelper  = $this->getViewHelper();
        $this->user        = Auth::user();      
    }  

    public function getViewHelper()
    {       
        return new ViewHelperService();    
    }  
    
    public function getParametrosService()
    {       
        return new ParametrosService();
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

    protected function index()
    {
        $classname            = $this->classNSpace . $this->type;
        $newClass             = new $classname();
        if(!$this->user->hasPermission("index-{$this->permiComp}|crud-{$this->permiComp}") 
            and !$this->user->is_admin) {
            $this->alert('warning', 'Acesso negado, contate o administrador');
            return [];
        } else {
            return $newClass::all();
        }     
    }  

    /**
     * Instantiate a new UserController instance.
     */
    public function new($type = null)
    {   
        if(!$this->user->hasPermission("new-{$this->permiComp}|crud-{$this->permiComp}") 
            and !$this->user->is_admin) {
            abort(403, "Acesso negado, contate o administrador");
        }    

        $this->type           = $type ? $type : $this->type;
        $this->formTitle      = "Novo";
        $classname            = $this->classNSpace . $this->type;
        $newClass             = new $classname();     
        $this->setFormOpen();

        return $newClass;
    }
    
    public function edit($key, $type)
    {
        if(!$this->user->hasPermission("edit-{$this->permiComp}|crud-{$this->permiComp}") 
            and !$this->user->is_admin) {
            abort(403, "Acesso negado, contate o administrador");
        }        
        $this->type = $type;
        $classname             = $this->classNSpace . $type;
        $newClass              = new $classname();  
        $this->formTitle       = "Editar";
  
        $this->setFormOpen();
        
        return $newClass::find($key);
    }     

   /**
     * Salva a model conforme o tipo editado ou criado
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param model $model
     */       
    public function submit($model, $type)
    {        
        $this->validate();
        $classname  = $this->classNSpace . $type;
        $class      = new $classname();
        $savedClass = null;
        
        if(isset($model['id'])) {
            $savedClass = $class->find($model['id'])->update($model);
        } else {
            $savedClass = $class->create($model);        
        }

        $this->setFormClose();
        $this->index();
        $this->alert('success', 'Salvo com sucesso');

        return $savedClass;
    } 
    
    /**
     * Método para evitar erro caso ainda não seja definido uma lista
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     * @param string $type
     * @param int $id
     */      
    public function list($type, $id = null)
    {
        $this->type      = $type;
        
        $this->formTitle = "Modal List não definido!";
        $this->modalList = $type;
    }    

    public function setFormOpen()
    {
        $this->modalForm = $this->type;
    }      

    /**
     * Fecha form aberto e carrega e abre o modal list
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */      
    public function setFormClose()
    {
        $this->modalForm = null;
        $this->list($this->type);
    }  

    /**
     * Fecha lista de indexs de Models Menus
     * @author Silvio Watakabe <silvio@tcmed.com.br>
     * @version 1.0
     */     
    public function setListClose()
    {
        $this->modalList = null;
    }  
    
    /**
     * Armazeona o id para executar exclusão caso confirmado
     *
     * @return response()
     */
    public function delete($id, $type)
    {
        if(!$this->user->hasPermission("delete-{$this->permiComp}|crud-{$this->permiComp}") 
            and !$this->user->is_admin) {
            abort(403, "Acesso negado, contate o administrador");
        }          
        $this->type         = $type;
        $this->deleteId     = $id;
        $this->modalDelete  = "true";
    } 
    
    public function deleteConfirm()
    {
        $classname             = $this->classNSpace . $this->type;
        $newClass              = new $classname();
        $newClass::find($this->deleteId)->delete();

        $this->index();
        $this->modalDeleteClose(); 
        $this->alert('success', 'Excluído com sucesso');
    }      
    
    
    /**
     * Fecha modalDelete sem excluir
     *
     * @return response()
     */    
    public function modalDeleteClose()
    {
        $this->modalDelete  = "false";
        $this->list($this->type);
    }    
    
    public function buildBtn($label = 'New', $mt = 'new()', $icon = 'plus'){

        $button = $this->getViewHelper()->buildButton($label, $mt, $icon);

        return $button;
    }    

    public function buildActBtn($label = 'New', $mt = 'new()', $icon = 'plus'){


        $button = $this->getViewHelper()->buildActionButton($label, $mt, $icon);

        return $button;
    }        

}
