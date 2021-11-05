<div class="relative">
    <x-sis-input label="Search" modelField='searchTerm' placeHolder='Digite uma busca' label='Search'
    method2='wire:keydown.escape=searchClear()'/>
    <div class="relative top-0 right-0 bottom-0 left-0" wire:click="searchClear()"></div>   
    @if(!empty($searchTerm))
      <div class="absolute w-full bg-white rounded-lg shadow-lg top-16">
        <ul class="divide-y-2 divide-gray-100 mb-0">
          @if(count($queryUsers) > 0)
              @foreach ($queryUsers as $user)
                <li class="p-2 hover:bg-blue-600 hover:text-blue-200" wire:click="selectUser({{$user->id}})">
                  <x-grid cols=2 spaces=4/>
                    <div>
                      {{$user->name}}
                    </div>                      
                    <div>
                      {{$user->email}}
                    </div>
                  <x-grid acao="close" />
                </li>
              @endforeach
          @else
              <li class="p-2 hover:bg-blue-600 hover:text-blue-200">
                Nenhum Resultado Encontrado
              </li>  
          @endif
        </ul>
      </div>
    @endIf
  </div>