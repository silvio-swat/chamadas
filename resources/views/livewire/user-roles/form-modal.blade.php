    <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
    <!-- onclick="openModal(true)" -->
    <div x-data="{ isOpen: {{ $modalOpen }} }">
      
      <!-- overlay transition-opacity transition-transform  -->
      <div 
      x-show="isOpen" x-cloak
      x-transition:enter="transition duration-300 transform"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition duration-300 transform"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      id="modal_overlay" class="pt-3 absolute inset-0 overflow-scroll bg-black bg-opacity-30 h-screen w-full items-start md:items-center md:pt-0">
      
        <!-- modal -translate-y-full scale-150  -->
        <div id="modal" 
        class="m-auto mt-3 transform relative w-10/10 md:w-1/3 bg-white rounded shadow-lg">
        
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
                      <input wire:model="roleModel.display_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border
                       border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="roleModel_display_name" type="text" placeholder="Digite para exibição">
                        @error('roleModel.display_name') <span class="error">{{ $message }}</span> @enderror
                      <p class="text-gray-600 text-xs italic"></p>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Papel
                      </label>
                      <input wire:model="roleModel.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Aplicado para os usuários">
                      @error('roleModel.name') <span class="error">{{ $message }}</span> @enderror
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