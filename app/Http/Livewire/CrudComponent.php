<?php

namespace App\Http\Livewire;

use App\Services\Helpers\ParametrosService;
use Livewire\Component;

class CrudComponent extends Component
{
    protected $param;

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

}
