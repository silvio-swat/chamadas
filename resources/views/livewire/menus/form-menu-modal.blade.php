      <!-------------------------------   HTML do modal do form ---------------------------->
      <!-- onclick="openModal(true)" -->
      <div x-data="{ isOpenMForm: {{ $modalFormMOpen }} }">
        {{-- <div class="p-3">
            <button  class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"
              @click="isOpenMForm = true"
            >
              Open Modal
            </button>
        </div> --}}
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
        x-show="isOpenMForm" x-cloak
        x-transition:enter="transition duration-300 transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="modal_overlay" class="absolute inset-0 overflow-scroll bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="formMModal" 
      
          class="m-auto transform relative w-10/10 md:w-1/3 bg-white rounded shadow-lg">
          
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenMForm = false"
                wire:click="setFormClose('Menu')"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                &cross;
              </button>
          
              <!-- header -->
              <div class="px-4 py-3 border-b border-gray-200">
              <h2 class="text-xl font-semibold text-gray-600">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="w-full p-20">
  
                <form class="w-full max-w-lg" wire:submit.prevent="submit({{$menuModel}}, 'Menu')">
                  <input wire:model="menuModel.menu_page_id" type="text" hidden>  
                                  
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Nome Exibição
                        </label>
                        <input wire:model="menuModel.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border
                         border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                          id="menu_name" type="text" placeholder="Digite para exibição">
                          @error('menuModel.name') <span class="error">{{ $message }}</span> @enderror
                        <p class="text-gray-600 text-xs italic"></p>
                      </div>
                    </div>
  
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Ordem
                        </label>
                        <input wire:model="menuModel.order" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="numeric" placeholder="Aplicado para os usuários">
                        @error('menuModel.order') <span class="error">{{ $message }}</span> @enderror
                        <p class="text-gray-600 text-xs italic"></p>
                      </div>
                    </div>       
                    
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Icone
                      </label>
                      <div class="relative">
                        <select wire:model="menuModel.icon" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                          @foreach ($iconsArray['solid'] as $item)
                            <option data-content="<i class='fa fa-{{$item}}'></i>" value="fa fa-{{$item}}">{{$item}}</option>
                          @endforeach
                        </select>
                        @error('menuModel.icon') <span class="error">{{ $message }}</span> @enderror
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                      </div>
                    </div>  
                  </div>  


                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                          Permission
                        </label>
                        <div class="relative">
                          <select wire:model="menuModel.permission_id" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none 
                          focus:bg-white focus:border-gray-500" id="menuModel_permission_id">
                            @foreach ($selPermissions as $item)
                              <option value="{{$item['value']}}">{{$item['descri']}}</option>
                            @endforeach
                          </select>
                          @error('menuModel.permission_id"') <span class="error">{{ $message }}</span> @enderror
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </div>
                        </div>
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
                    @click="isOpenMForm = false"
                    wire:click="setFormClose('Menu')"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
                >Close</button>
              </div>
          </div>
        </div>
      </div>