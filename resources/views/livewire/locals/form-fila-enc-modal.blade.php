<!-------------------------------   HTML do modal Form ------------------------------------>
@modal_form_ini(['formType' => 'FilaEnc', 'modalForm' => $modalForm, 'formTitle' => $formTitle,
    'model' => $model, $model => $$model]) @endmodal_form_ini

    <x-sis-input label="Fila de Encaminhamento(*)" tipo="select" modelField='filaModel.id' elementId='filaModel-id'
    :selectItems='$selectFilas' />
@modal_form_fim(['saveLabel' => 'Adicionar Fila de Encaminhamento']) @endmodal_form_fim