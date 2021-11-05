<!-------------------------------   HTML do modal Form de Cad. Usuário ---------------------->

@modal_form_ini(['formType' => 'User', 'cols' => 2, 'spaces' => 4, 'w' => 'w-11/12',
  'modalForm' => $modalForm, 'formTitle' => $formTitle, 'model' => $model, $model => $$model])
@endmodal_form_ini()
    <x-sis-input modelField='userModel.id' disabled="hidden"/>
    
    @include('components.search-users', ['fieldName' => 'userModel.name',
                              'labelName' => 'Nome(*)',
                              'autoFields' => [
                                'userModel.name'     => 'label',
                                'userModel.is_admin' => 'is_admin',
                                'userModel.email'    => 'email',
                                'userModel.id'       => 'value',
                                ]
                              ])

    <x-sis-input label="Email(*)" modelField='userModel.email' placeHolder='Digite o e-mail'/>

    <x-grid acao='close' />
    <x-grid cols=4 spaces=4/>

    <x-sis-input label="Senha(*)" tipo="password" modelField='password' placeHolder='Digite a senha'/>

    <x-sis-input label="Repita a senha(*)" tipo="password" modelField='password_confirmation' placeHolder='Repita a senha'/>

      @php
        $render = isset($userModel->id) ? 'hidden' : null;
      @endphp

    <x-sis-input label="Papel(*)" tipo="select" modelField='roleModel.id' elementId='roleModel-id2' :selectItems='$selectRoles' :render='$render' />

    <x-sis-input label="IsAdmin" tipo="checkbox" modelField='userModel.is_admin' />

    @stack('custom-scripts')

@modal_form_fim(['saveLabel' => 'Salvar Usuário'])@endmodal_form_fim()