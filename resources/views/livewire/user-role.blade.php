<div>

  <div class="bg-white shadow">

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Papeis de Usuários') }}
      </h2>

    </div>
  </div>

<div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
  <div class="py-3 ">
    <button
      wire:click="new()"
      class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
      active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
      <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
        <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                C15.952,9,16,9.447,16,10z" />
      </svg>
      <span>New</span>
    </button>
  </div>   


    <div class="flex flex-col my-3">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nome de Exibição
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Papel
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Descrição
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span class="sr-only">Edit</span>
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <span class="sr-only">Excluir</span>
                  </th>              
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
    
                @foreach($roles as $role)        
                <tr class="bg-emerald-200">
    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span>{{ $role->display_name }}</span>
                    </td>
    
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span>{{ $role->name }}</span>
                    </td>     

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span>{{ $role->description }}</span>
                  </td>                             
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                      <button wire:click="edit({{$role->id}})">Edit</button>
                      {{-- <a href="#" wire:click="edit({{$role->id}})" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                    </td>  
                    <td class="px-6 py-4 whitespace-nowrap">
                      <button wire:click="delete({{$role->id}})">X</button>
                      {{-- <a href="#" wire:click="delete({{$role->id}})" class="text-red-600 hover:text-indigo-900">Delete</a> --}}
                    </td>                                
                </tr>        
                @endforeach    
                <!-- More people... -->
              </tbody>
            </table>
          
          </div>
        </div>
      </div>
    </div> 
    
    
    
    
    <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
    <!-- onclick="openModal(true)" -->
    <div x-data="{ isOpen: {{ $modalOpen }} }">
      {{-- <div class="p-3">
          <button  class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"
            @click="isOpen = true"
          >
            Open Modal
          </button>
      </div> --}}
      
      <!-- overlay transition-opacity transition-transform  -->
      <div 
      x-show="isOpen" 
      x-transition:enter="transition duration-300 transform"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition duration-300 transform"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      id="modal_overlay" class="absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
      
        <!-- modal -translate-y-full scale-150  -->
        <div id="modal" 
    
        class="pacity-0 transform relative w-10/10 md:w-1/3 h-1/2 md:h-3/4 bg-white rounded shadow-lg">
        
            <!-- button close 
              onclick="openModal(false)"-->
            <button 
              @click="isOpen = false"
              wire:click="setModalClose()"
              class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
              &cross;
            </button>
        
            <!-- header -->
            <div class="px-4 py-3 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-600">{{$formTitle}}</h2>
            </div>
        
            <!-- body -->
            <div class="w-full p-20">

              <form class="w-full max-w-lg" wire:submit.prevent="submit({{$roleModel}})">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Nome Exibição
                      </label>
                      <input wire:model="roleModel.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border
                       border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="roleModel_name" type="text" placeholder="Digite para exibição">
                        @error('roleModel_name') <span class="error">{{ $message }}</span> @enderror
                      <p class="text-gray-600 text-xs italic"></p>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Papel
                      </label>
                      <input wire:model="roleModel.display_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Aplicado para os usuários">
                      @error('roleModel.display_name') <span class="error">{{ $message }}</span> @enderror
                      <p class="text-gray-600 text-xs italic"></p>
                    </div>
                  </div>                      

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Descrição
                      </label>
                      <textarea wire:model="roleModel.description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Aplicado para os usuários">
                      </textarea>
                      @error('roleModel.description') <span class="error">{{ $message }}</span> @enderror
                      <p class="text-gray-600 text-xs italic"></p>
                    </div>
                  </div>  

                </div>
        
            <!-- footer -->
            <div class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
            <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded 
            text-white focus:outline-none" type="submit">Save</button>

          </form>
              <!-- onclick="openModal(false)" -->
              <button 
                  @click="isOpen = false"
                  wire:click="setModalClose()"
                  class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
              >Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>    

        
        
