<div>
  <div class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Permissões de acesso') }}
      </h2>

    </div>
  </div>
  
  <div class="mx-auto py-2 px-4 sm:px-6 lg:px-8">
    
    <x-grid cols=3 spaces=4 class="justify-center" />
      <div>
        <x-grid cols=2 spaces=1 class="justify-center"/>
          <x-sis-button method="new()" label="Nova Permissão"/>
        <x-grid acao="close"/>
      </div>
      <x-sis-input label="Search" modelField='searchTerm' placeHolder='Digite o termo desejado' label='Buscar'/>      
      <div>
      </div>       
    <x-grid acao='close' />    

    @php
      // Seta a posição dos botões de ação: inicio = start e fim = null
      $acao = 'end';
    @endphp
      <x-table />
        <x-render-thead :items="['Tipo',
                    'NOME DE EXIBIÇÃo',
                      'PERMISSÃO',
                      'DESCRIÇÃO',
                      'MENU',
                      'CONTROLLER',
                      'ACTION',
                      ]" :acao="$acao" />

        @foreach($permissions as $permission) 

          <x-render-tbody 
            :items="[$permission->type,
                    $permission->display_name,
                    $permission->name,
                    $permission->description,
                    $permission->menu,
                    $permission->controller,
                    $permission->action]"
            :id="$permission->id" :acao="$acao" modelName="Permission"/>

        @endforeach 
      <x-table acao="close"/>

      <div>
        {{ $permissions->links() }}
      </div>

      @include('livewire.permissions.form-modal')
      @include('layouts.delete-modal')

    </div>
  </div>    
  
          
          
  