<!-------------------------------   HTML do modal Form ---------------------------->
@modal_form_ini(['formType' => 'User', 'cols' => 2, 'spaces' => 4, 'w' => 'w-11/12','modalForm' => $modalForm, 
'formTitle' => $formTitle, 'model' => $model, $model => $$model])@endmodal_form_ini()
    
    @input_text(['label' => 'Nome(*)', 'modelField' => 'userModel.name',
      'placeHolder' => 'Digite o Nome']) @endinput_text()

    @input_text(['label' => 'Email(*)', 'modelField' => 'userModel.email',
      'placeHolder' => 'Digite o e-mail'])@endinput_text()
    
    @grid_fim()@endgrid_fim
    @grid_ini(['cols' => 4, 'spaces' => 4])@endgrid_ini()

    @input_password(['label' => 'Senha(*)', 'modelField' => 'password',
      'placeHolder' => 'Digite a senha'])@endinput_password()
      
    @input_password(['label' => 'Repita a senha(*)', 'modelField' => 'password_confirmation',
      'placeHolder' => 'Repita a senha'])@endinput_password()

      @php
        $render = isset($userModel->id) ? 'false' : 'true';
      @endphp    
      @input_select($roleSel = ['label' => 'Papel(*)', 'modelField' => 'roleModel.id',
        'selectItems' => $selectRoles, 'render' => $render])@endinput_select()

    @input_box(['label' => 'IsAdmin', 'modelField' => 'userModel.is_admin'])@endinput_box()  
    
@modal_form_fim(['saveLabel' => 'Salvar Usuário'])@endmodal_form_fim()