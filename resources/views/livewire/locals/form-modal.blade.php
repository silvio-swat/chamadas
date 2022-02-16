<!-------------------------------   HTML do modal Form de Cad. Usuário ---------------------->

@modal_form_ini(['formType' => 'Local', 'cols' => 1, 'spaces' => 4, 'w' => 'w-11/12',
  'modalForm' => $modalForm, 'formTitle' => $formTitle, 'model' => $model, $model => $$model])
@endmodal_form_ini()
    <x-sis-input modelField='localModel.id' disabled="hidden"/>
    
    {{-- @include('components.search-users', ['fieldName' => 'userModel.name',
                              'labelName' => 'Nome(*)',
                              'autoFields' => [
                                'userModel.name'     => 'label',
                                'userModel.is_admin' => 'is_admin',
                                'userModel.email'    => 'email',
                                'userModel.id'       => 'value',
                                ]
                              ]) --}}

    <x-sis-input label="Nome" tipo="text" modelField='localModel.nome' placeHolder='Digite o nome da local'/>

    <x-grid acao='close' />
    <x-grid cols=5 spaces=4/>

    <x-sis-input label="Rótulo" tipo="text" modelField='localModel.rotulo' placeHolder='Menor maior a prioridade'/>

    <x-sis-input label="Fila Padrão(*)" tipo="select" modelField='localModel.fila_id' elementId='localModel-fila_id'
     :selectItems='$selectFilas' />    

@modal_form_fim(['saveLabel' => 'Salvar Local'])@endmodal_form_fim()