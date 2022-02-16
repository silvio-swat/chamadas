<!-------------------------------   HTML do modal Form de Cad. Usuário ---------------------->

@modal_form_ini(['formType' => 'Fila', 'cols' => 1, 'spaces' => 4, 'w' => 'w-11/12',
  'modalForm' => $modalForm, 'formTitle' => $formTitle, 'model' => $model, $model => $$model])
@endmodal_form_ini()
    <x-sis-input modelField='filaModel.id' disabled="hidden"/>
    
    {{-- @include('components.search-users', ['fieldName' => 'userModel.name',
                              'labelName' => 'Nome(*)',
                              'autoFields' => [
                                'userModel.name'     => 'label',
                                'userModel.is_admin' => 'is_admin',
                                'userModel.email'    => 'email',
                                'userModel.id'       => 'value',
                                ]
                              ]) --}}

    <x-sis-input label="Nome" modelField='filaModel.nome' placeHolder='Digite o nome da fila'/>

    <x-grid acao='close' />
    <x-grid cols=5 spaces=4/>

    <x-sis-input label="Prioridade" tipo="number" modelField='filaModel.prioridade' placeHolder='Menor maior a prioridade'/>

    <x-sis-input label="Temp. Min. Atend." tipo="number" placeHolder='(minutos)' modelField='filaModel.temp_minimo_atend' 
    elementId='filaModel-temp_minimo_atend' />

    <x-sis-input label="Temp. Max. Atend." tipo="number" placeHolder='(minutos)' modelField='filaModel.temp_maximo_atend' 
    elementId='filaModel-temp_maximo_atend' />

    <x-sis-input label="Temp. Ideal. Atend." tipo="number" placeHolder='(minutos)' modelField='filaModel.temp_ideal_atend' 
    elementId='filaModel-temp_ideal_atend' />

    <x-sis-input label="Temp. Max. Espera." tipo="number" placeHolder='(minutos)' modelField='filaModel.temp_maximo_espera' 
    elementId='filaModel-temp_maximo_espera' />

@modal_form_fim(['saveLabel' => 'Salvar Fila'])@endmodal_form_fim()