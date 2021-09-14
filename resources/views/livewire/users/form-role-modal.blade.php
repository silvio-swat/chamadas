<!-------------------------------   HTML do modal Form ---------------------------->
@modal_form_ini(['formName' => 'Role', 'modalForm' => $modalForm, 'formTitle' => $formTitle,
 'model' => $model, $model => $$model, 'method' => 'addRole']) @endmodal_form_ini
        
    @input_select(['label' => 'Papel(*)', 'modelField' => 'roleId', 
    'selectItems' => $selectRoles])@endinput_select

    
@modal_form_fim(['saveLabel' => 'Adicionar Papel']) @endmodal_form_fim


