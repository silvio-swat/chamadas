<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $acao;
    public $size;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acao = 'open',  $size = 'w-full', $class = 'modal--table')
    {
        $this->acao         = $acao;
        $this->size         = $size;
        $this->class        = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
