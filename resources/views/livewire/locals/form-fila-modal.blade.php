<!-------------------------------   HTML do modal Form ------------------------------------>
@modal_form_ini(['formType' => 'Fila', 'modalForm' => $modalForm, 'formTitle' => $formTitle,
 'model' => $model, $model => $$model]) @endmodal_form_ini

    <x-sis-input label="Fila de Espera(*)" tipo="select" modelField='filaModel.id' elementId='filaModel-id'
    :selectItems='$selectFilas' />

@modal_form_fim(['saveLabel' => 'Adicionar Fila de Espera']) @endmodal_form_fim