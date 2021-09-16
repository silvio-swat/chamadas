@php
  // Seta a posição dos botões de ação: inicio = start e fim = null
  $acao = null;
@endphp

<div>
  @page_title(['pageTitle' => 'Usuário']) @endpage_title()
  <div class="modal--body-div">
    @button(['method' => "new('User')",'label' => 'Novo Usuário', 'icon' => 'plus'])@endbutton()
              
      @table_open() @endtable_open()
        @render_thead(['items' => [
          'Usuário',
          'Email',
          'Papel'
        ], 'acao' => $acao]) @endrender_thead()

        @foreach($users as $user)  
          @php
            // Botões de ação personalizados
            $lambda  = $this->buildActBtn('Editar', 'edit(' . $user->id . ', "User")', 'edit');
            $lambda .= $this->buildActBtn('Excluir', 'delete(' . $user->id . ', "User")', 'trash');
            // Seta botão adiciona novas roles no usuário
            $strRoles = $this->buildBtn('', 'new("Role",' . $user->id . ')');
            $i = 0;
            // Busca todas os papeis para exibir na coluna
            foreach($user->roles ?? [] as $role) {
              $btnDelRole = $this->buildActBtn('', 'delete(' . $role . ', "Role")', 'trash');
              $strRoles .= $i < 1 ? $role->name : '<br />' . $role->name;
              $strRoles .= $btnDelRole;
              $i++;
            }
          @endphp

          @render_tbody(['items' => [
            $user->name,
            $user->email,
            $strRoles
          ], 'id' => $user->id, 'lambda' => $lambda,  'acao' => $acao])
          @endrender_tbody() 
                   
        @endforeach 
      @table_close() @endtable_close()
      
      @include('livewire.users.form-modal')
      @include('livewire.users.form-role-modal')
      @include('layouts.delete-modal')      
  </div>
</div>    
  
          
          
  
