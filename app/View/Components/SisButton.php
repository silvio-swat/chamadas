<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SisButton extends Component
{
    public $method;
    public $class;
    public $icon;
    public $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method=null, $class='new--button', $icon='plus', $label='novo')
    {
        $this->method = $method;
        $this->class  = $class;
        $this->icon   = $icon;
        $this->label  = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sis-button');
    }
}
