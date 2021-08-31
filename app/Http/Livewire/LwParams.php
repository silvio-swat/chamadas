<?php

namespace App\Http\Livewire;

use App\Models\Param;
use Livewire\Component;

class LwParams extends Component
{
    public $params;
    public $paramModel;
    public $modalOpen = false;
    public $formTitle = "Lista de parâmetros";

    /**
     * Instantiate a new UserController instance.
     */
    public function mount()
    {      
        $this->params = Param::all();
    } 

    public function render()
    {
        return view('livewire.params.lw-params');
    }
}
