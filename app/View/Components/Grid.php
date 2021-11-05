<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Grid extends Component
{
    public $acao;
    public $cols;
    public $spaces;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acao = 'open', $cols = 1, $spaces = 3, $class = null)
    {
        $this->acao   = $acao;
        $this->cols   = $cols;
        $this->spaces = $spaces;
        $this->class  = $class; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grid');
    }
}
