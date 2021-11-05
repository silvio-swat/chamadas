<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Content extends Component
{
    public $acao;
    public $class;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acao='open', $class='modal--body-div')
    {
        $this->acao  = $acao;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content');
    }
}
