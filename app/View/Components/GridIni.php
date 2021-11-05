<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GridIni extends Component
{
    public $tipo;
    public $cols;
    public $spaces;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo = 'open', $cols = 1, $spaces = 3)
    {
        $this->tipo   = $tipo;
        $this->cols   = $cols;
        $this->spaces = $spaces;
    }

    /**
     * Get the view / contents that re=> 4])@endgridiew\View|\Closure|string
     */
    public function render()
    {
        return view('components.grid-ini');
    }
}
