@php
  // Seta a posição dos botões de ação: inicio = start e fim = null
  $acao = false;
@endphp

<div>
  @page_title(['pageTitle' => 'Papéis e Pemissões']) @endpage_title()
  @content_open() @endcontent_open()
              
    @table_open() @endtable_open()
      @render_thead(['items' => [
        'Papel de usuário',
        'Descrição',
        'Permissões Vinculadas',
      ], 'acao' => $acao]) 
      @endrender_thead()

      @foreach($roles as $role)  
        @php
          // Seta botão adiciona novas roles no usuário
          $strPemissions = $this->buildBtn('', 'new("Permission",' . $role->id . ')');
          $i = 0;
          // Busca todas as permissions do papel de usuários para exibir na coluna
          foreach($role->permissions  as $permission) {
            $btnDelPermission = $this->buildActBtn('', 'delete(' . $permission . ', "Permission")', 'trash');
            $strPemissions .= "<pre>{$permission->display_name}{$btnDelPermission}</pre>";
            // $strPemissions .= $btnDelPermission;
            $i++;
          }
        @endphp

        @render_tbody(['items' => [
          $role->display_name,
          $role->description,
          $strPemissions
        ], 'id' => $role->id, 'lambda' => $lambda,  'acao' => $acao])
        @endrender_tbody() 
                  
      @endforeach 
    @table_close() @endtable_close()
    @include('layouts.delete-modal')
    @include('livewire.roles-permissions.form-modal')
  @content_close() @endcontent_close()   
