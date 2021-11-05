<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RenderThead extends Component
{
    public $acao;
    public $items;
    public $trClass;
    public $thClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acao = 'start', $items = [], $trClass = null, $thClass = 'modal--table-th')
    {
        $this->acao      = $acao;
        $this->items     = $items;
        $this->trClass   = $trClass;
        $this->thClass   = $thClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.render-thead');
    }
}
