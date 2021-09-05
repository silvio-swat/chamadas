    <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->

    <div x-data="{ isOpenPItem: {{ $modalItemOpen }} }" >

      
      <!-- overlay transition-opacity transition-transform  -->
      <div 
      x-show="isOpenPItem" x-cloak
      x-transition:enter="transition duration-300 transform"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition duration-300 transform"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      id="modal_overlay" class="absolute top-0 right-0  'overflow-visible y-full w-full inset-0 bg-black bg-opacity-30 h-screen flex justify-center items-start md:items-center pt-10 md:pt-0">
      
        <!-- modal -translate-y-full scale-150  -->
        <div id="modal" 
    
        class="m-auto transform relative w-10/10 md:w-1/3 bg-white rounded shadow-lg">
        
            <!-- button close 
              onclick="openModal(false)"-->
            <button 
              @click="isOpenPItem = false"
              wire:click="setModalClose('paramItem')"
              class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
              &cross;
            </button>
        
            <!-- header -->
            <div class="px-4 py-3 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-600">{{$formTitle}}</h2>
            </div>
        
            <!-- body -->
            <div class="w-full p-20">

              <form class="w-full max-w-lg" wire:submit.prevent="submit({{$paramItemModel}}, 'paramItem')">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Conteúdo
                      </label>
                      <input wire:model="paramItemModel.conteudo" class="appearance-none block w-full bg-gray-200 text-gray-700 border
                       border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="paramItemModel_conteudo" type="text" placeholder="Digite para exibição">
                        @error('paramItemModel.conteudo') <span class="error">{{ $message }}</span> @enderror
                      <p class="text-gray-600 text-xs italic"></p>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Descricao
                      </label>
                      <input wire:model="paramItemModel.descricao" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="paramItem_descricao" type="text" placeholder="Aplicado para os usuários">
                      @error('paramItemModel.descricao') <span class="error">{{ $message }}</span> @enderror
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
                  @click="isOpenPItem = false"
                  wire:click="setModalClose('paramItem')"
                  class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
              >Close</button>
            </div>
        </div>
      </div>
    </div>