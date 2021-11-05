<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SisInput extends Component
{
    public $tipo;
    public $label;
    public $modelField;
    public $placeHolder;
    public $disabled;
    public $selectItems;
    public $show;
    public $method;
    public $method2;
    public $elementId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo = 'text', $label = null, $modelField = null ,$placeHolder = null,
        $method=null, $disabled = false, $selectItems = [], $render=null, $method2=null, $elementId = null)
    {
        $this->tipo         = $tipo;
        $this->label        = $label;
        $this->modelField   = $modelField;
        $this->placeHolder  = $placeHolder;
        $this->disabled     = $disabled;
        $this->selectItems  = $selectItems; 
        $this->show         = $render;
        $this->method       = $method;
        $this->method2      = $method2;
        $this->elementId    = $elementId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sis-input');
    }
}
