@php
  // Seta a posição dos botões de ação: inicio = start e fim = null
  $acao = 'end';
@endphp

<div>
  <x-page-title pageTitle="Locals de Atendimento" />
  <x-content acao="open"/>
    <x-grid cols=3 spaces=4 class="justify-center" />
      <div>
        <x-grid cols=2 spaces=1 class="justify-center"/>
          <x-sis-button method="new('Local')" label="Novo Local"/>
          {{-- <x-sis-button method="searchUserClear('listAll')" icon="times" label="Limpar pesquisa" class="red--button"/> --}}
        <x-grid acao="close"/>
      </div>
      {{-- @livewire('user-autocomp') --}}
      {{-- @include('search-users', ['autoComp' => false, 'fieldName' => 'searchTerm'])       --}}
      {{-- <x-sis-input label="Search" modelField='searchTerm' placeHolder='Digite uma busca' label='Search'/>       --}}
      <div>
      </div>
    <x-grid acao='close' />
      
    <x-table />
      <x-render-thead :items="['id','Nome', 'Rótulo', 'Status', 'Fila Padrão', 'Filas de Espera', 'Filas de Encaminhamento' ]" :acao="$acao" />

      @foreach($locals as $local)
        @php
          // Botões de ação personalizados
          // $lambda  = $this->buildActBtn('Editar', 'edit(' . $user->id . ', "User")', 'edit');
          // $lambda .= $this->buildActBtn('Excluir', 'delete(' . $user->id . ', "User")', 'trash');
          // Seta botão adiciona novas roles no usuário
          // $strRoles = $this->buildBtn('', 'new("Role",' . $user->id . ')');
          $strFilas = $this->buildActBtn('Adicionar Fila de espera', 'new("Fila",' . $local->id . ')') . '<br />';
          $i = 0;
          // Busca todas as filas de espera para exibir na coluna
          foreach($local->filas ?? [] as $fila) {
            $btnDelFila = $this->buildActBtn('', 'delete(' . $fila . ', "Fila")', 'trash');
            $strFilas  .= $i < 1 ? $fila->nome : '<br />' . $fila->nome;
            $strFilas  .= $btnDelFila;
            $i++;
          }

          $strFilaEncs = $this->buildActBtn('Adicionar Fila de encaminhamento', 'new("Fila",' . $local->id . ',"enc")') . '<br />';
          $i = 0;
          // Busca todas as filas de encaminhamento para exibir na coluna
          foreach($local->filaEncs ?? [] as $fila) {
            $btnDelFila    = $this->buildActBtn('', 'delete(' . $fila . ', "Fila", "Enc")', 'trash');
            $strFilaEncs  .= $i < 1 ? $fila->nome : '<br />' . $fila->nome;
            $strFilaEncs  .= $btnDelFila;
            $i++;
          }          
        @endphp

        <x-render-tbody 
          :items="[$local->id,
                   $local->nome,
                   $local->rotulo,
                   $local->status, 
                   $local->fila->nome,
                   $strFilas,
                   $strFilaEncs
                   ]" 
          :id="$local->id" :acao="$acao" :modelName="$type" />
      @endforeach 
    <x-table acao="close"/>

    {{-- <div>
       {{ $locals->links() }},
    </div> --}}

    @include('livewire.locals.form-modal')
    @include('livewire.locals.form-fila-modal')
    @include('livewire.locals.form-fila-enc-modal')
    @include('layouts.delete-modal')
  <x-content acao="close"/>
</div>  