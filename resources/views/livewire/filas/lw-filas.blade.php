@php
  // Seta a posição dos botões de ação: inicio = start e fim = null
  $acao = 'end';
@endphp

<div>
  <x-page-title pageTitle="Filas de Atendimento" />
  <x-content acao="open"/>
    <x-grid cols=3 spaces=4 class="justify-center" />
      <div>
        <x-grid cols=2 spaces=1 class="justify-center"/>
          <x-sis-button method="new('Fila')" label="Nova Fila"/>
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
      <x-render-thead :items="['Nome', 'Prioridade', 'T.Min.Atend.', 'T.Max.Atend.', 'T.Ideal.Atend.', 'T.Max.Esp.']" :acao="$acao" />

      @foreach($filas as $fila)
        @php
          // Botões de ação personalizados
          // $lambda  = $this->buildActBtn('Editar', 'edit(' . $fila->id . ', "'. $type .'")', 'edit');
          // $lambda .= $this->buildActBtn('Excluir', 'delete(' . $fila->id . ', "'. $type .'")', 'trash');
        @endphp

        <x-render-tbody 
          :items="[$fila->nome,
                   $fila->prioridade,
                   $fila->temp_minimo_atend,
                   $fila->temp_maximo_atend,
                   $fila->temp_ideal_atend,
                   $fila->temp_maximo_espera,
                   ]" 
          :id="$fila->id" :acao="$acao" :modelName="$type" />
      @endforeach 
    <x-table acao="close"/>

    {{-- <div>
       {{ $filas->links() }},
    </div> --}}

    @include('layouts.delete-modal')
    @include('livewire.filas.form-modal')
    {{-- @include('livewire.users.form-role-modal') --}}
  <x-content acao="close"/>
</div>  


  
          
          
  

