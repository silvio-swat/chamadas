<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalForm extends Component
{
    public $acao;
    public $modalForm;
    public $formType;
    public $formTitle;
    public $width;
    public $method;
    public $model;
    public $cols;
    public $spaces;
    public $saveLabel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($acao = 'open', $modalForm, $formType, $formTitle = 'Sem titulo',
        $width = 'w-5/6', $method = 'submit', $model, $cols = 1, $spaces = 4, $saveLabel = 'Salvar')
    {
        $this->acao      = $acao;
        $this->modalForm = $modalForm;
        $this->formType  = $formType;
        $this->formTitle = $formTitle;
        $this->width     = $width;
        $this->method    = $method;
        $this->model     = $model;
        $this->cols      = $cols;
        $this->spaces    = $spaces;
        $this->saveLabel = $saveLabel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-form');
    }
}
