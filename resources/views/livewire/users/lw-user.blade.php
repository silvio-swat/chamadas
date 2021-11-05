@php
  // Seta a posição dos botões de ação: inicio = start e fim = null
  $acao = 'end';
@endphp

<div>
  <x-page-title pageTitle="Usuários" wire:click="searchUserClear()"/>
  <x-content acao="open"/>
    <x-grid cols=3 spaces=4 class="justify-center" />
      <div>
        <x-grid cols=2 spaces=1 class="justify-center"/>
          <x-sis-button method="new('User')" label="Novo Usuário"/>
          <x-sis-button method="searchUserClear('listAll')" icon="times" label="Limpar pesquisa" class="red--button"/>
        <x-grid acao="close"/>
      </div>
      {{-- @livewire('user-autocomp') --}}
      {{-- @include('search-users', ['autoComp' => false, 'fieldName' => 'searchTerm'])       --}}
      <x-sis-input label="Search" modelField='searchTerm' placeHolder='Digite uma busca' label='Search'/>      
      <div>
      </div>       
    <x-grid acao='close' />
      
    <x-table />
      <x-render-thead :items="['Usuário', 'Email', 'Papel']" :acao="$acao" />

      @foreach($users as $user)  
        @php
          // Botões de ação personalizados
          $lambda  = $this->buildActBtn('Editar', 'edit(' . $user->id . ', "User")', 'edit');
          $lambda .= $this->buildActBtn('Excluir', 'delete(' . $user->id . ', "User")', 'trash');
          // Seta botão adiciona novas roles no usuário
          // $strRoles = $this->buildBtn('', 'new("Role",' . $user->id . ')');
          $strRoles = $this->buildActBtn('Novo Papel', 'new("Role",' . $user->id . ')') . '<br />';
          $i = 0;
          // Busca todas os papeis para exibir na coluna
          foreach($user->roles ?? [] as $role) {
            $btnDelRole = $this->buildActBtn('', 'delete(' . $role . ', "Role")', 'trash');
            $strRoles .= $i < 1 ? $role->name : '<br />' . $role->name;
            $strRoles .= $btnDelRole;
            $i++;
          }
        @endphp

        <x-render-tbody 
          :items="[$user->name,
                   $user->email,
                   $strRoles]"
          :id="$user->id" :lambda="$lambda" :acao="$acao"/>

      @endforeach 
    <x-table acao="close"/>

    <div>
      {{ $users->links() }}
    </div>

    @include('layouts.delete-modal')
    @include('livewire.users.form-modal')
    @include('livewire.users.form-role-modal')
  <x-content acao="close"/>
</div>  


  
          
          
  
