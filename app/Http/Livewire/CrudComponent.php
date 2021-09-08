<?php

namespace App\Http\Livewire;

use App\Services\Helpers\ParametrosService;
use Livewire\Component;

class CrudComponent extends Component
{
    protected $param;
    public    $modalDelete = 'false';
    public    $deleteId;
    public    $type        = null; 

    public function __construct()
    {
        $this->param = new ParametrosService();
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

    /**
     * Armazeona o id para executar exclusão caso confirmado
     *
     * @return response()
     */
    public function delete($id, $type)
    {
        $this->deleteId     = $id;
        $this->modalDelete  = "true";
        $this->type         = $type;
    }    
    
    /**
     * Fecha modalDelete sem excluir
     *
     * @return response()
     */    
    public function modalDeleteClose()
    {
        $this->modalDelete  = "false";
    }         

}
