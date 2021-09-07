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
              class="modal--close--button">
              &cross;
            </button>
        
            <!-- header -->
            <div class="modal--header">
              <h2 class="modal--h2">{{$formTitle}}</h2>
            </div>
        
            <!-- body -->
            <div class="modal--body">

              <form class="modal--form-class" wire:submit.prevent="submit({{$permissionModel}})">

                <div class="modal--form-input-div-1">                
                <div class="modal--form-input-div-2">
                  <label class="modal--form-label" for="grid-state">
                    Tipo(*)
                  </label>
                  <div class="relative">
                    <select wire:model="permissionModel.type" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none 
                    focus:bg-white focus:border-gray-500" id="permissionModel_type">
                      <option value="">Escolha um tipo</option>
                      @foreach ($selectTipos as $item)
                        <option value="{{$item['value']}}">{{$item['descri']}}</option>
                      @endforeach
                    </select>
                    @error('permissionModel.type') <span class="error">{{ $message }}</span> @enderror
                    <div class="modal--form-select-svg">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
                </div>
                </div>

                <div class="modal--form-input-div-1" x-show={{$permissionModel->type != "menu" ? 'false' : 'true'}}>                
                  <div class="modal--form-input-div-2">
                    <label class="modal--form-label" for="grid-state">
                      Menu(*)
                    </label>
                    <div class="relative">
                      <select wire:model="permissionModel.menu" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none 
                      focus:bg-white focus:border-gray-500" id="permissionModel_menu">
                        <option value="">Escolha o Menu (Crie primeiro)</option>
                        @foreach ($selectMenus as $item)
                          <option value="{{$item['value']}}">{{$item['descri']}}</option>
                        @endforeach
                      </select>
                      @error('permissionModel.name') <span class="error">{{ $message }}</span> @enderror
                      <div class="modal--form-select-svg">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="modal--form-input-div-1" x-show={{$permissionModel->type == "menu" ? 'false' : 'true'}}>                
                    <div class="modal--form-input-div-2">
                      <label class="modal--form-label" for="grid-state">
                        Controller(*)
                      </label>
                      <div class="relative">
                        <select wire:model="permissionModel.controller" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none 
                        focus:bg-white focus:border-gray-500" id="permissionModel_controller">
                          <option value="">Escolha o Controller</option>
                          @foreach ($selectControllers as $item)
                            <option value="{{$item['value']}}">{{$item['descri']}}</option>
                          @endforeach
                        </select>
                        @error('permissionModel.name') <span class="error">{{ $message }}</span> @enderror
                        <div class="modal--form-select-svg">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                      </div>
                    </div>
                  </div>                  

              <div class="modal--form-input-div-1" x-show={{$permissionModel->type == "menu" ? 'false' : 'true'}}>
                <div class="modal--form-input-div-2">
                  <label class="modal--form-label" for="grid-password">
                    Método
                  </label>
                  <input wire:model="permissionModel.method" class="appearance-none block w-full bg-gray-200 text-gray-700 border
                    border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="permissionModel_method" type="text" placeholder="Digite para exibição">
                    @error('permissionModel.method') <span class="error">{{ $message }}</span> @enderror
                  <p class="modal--form-p-error"></p>
                </div>
              </div>

              <div class="modal--form-input-div-1">
                <div class="modal--form-input-div-2">
                  <label class="modal--form-label" for="grid-password">
                    Descrição
                  </label>
                  <textarea wire:model="permissionModel.description" class="modal--form-input" id="grid-password" type="text" placeholder="Aplicado para os usuários">
                  </textarea>
                  @error('permissionModel.description') <span class="error">{{ $message }}</span> @enderror
                  <p class="modal--form-p-error"></p>
                </div>
              </div>  

            </div>
        
            <!-- footer -->
            <div class="modal--form-footer">
            <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded 
            text-white focus:outline-none" type="submit">Save</button>

          </form>
              <!-- onclick="openModal(false)" -->
              <button 
                  @click="isOpen = false"
                  wire:click="setModalClose()"
                  class="delete--button"
              >Close</button>
            </div>
        </div>
      </div>
    </div>