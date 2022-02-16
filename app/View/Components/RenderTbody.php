<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RenderTbody extends Component
{
    public $acao;
    public $items;
    public $trClass;
    public $tdClass;
    public $id;   
    public $lambda;   
    public $modelName;
 
    /**
     * Create a new component instance
     *
     * @return void
     */
    public function __construct(
        $acao    = 'start',
        $items   = [],
        $trClass = 'modal--table-tr',
        $tdClass = 'modal--table-td',
        $id      = null,
        $lambda  = null,
        $modelName = null,)
    {
        $this->acao      = $acao;
        $this->items     = $items;
        $this->trClass   = $trClass;
        $this->tdClass   = $tdClass;
        $this->id        = $id;
        $this->lambda    = $lambda;
        $this->modelName = $modelName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.render-tbody');
    }
}
