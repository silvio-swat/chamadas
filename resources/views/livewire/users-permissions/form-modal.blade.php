<!-------------------------------   HTML do modal Form ---------------------------->
@modal_form_ini(['formType' => 'Permission', 'cols' => 1, 'spaces' => 4, 'w' => 'w-1/2','modalForm' => $modalForm, 
'formTitle' => $formTitle, 'model' => $model, $model => $$model])@endmodal_form_ini()
 
  @input_select($roleSel = ['label' => 'Permissão(*)', 'modelField' => 'permissionModel.id',
  'selectItems' => $selectPermissions])@endinput_select()    
    
@modal_form_fim(['saveLabel' => 'Vincular Permissão com papel'])@endmodal_form_fim()