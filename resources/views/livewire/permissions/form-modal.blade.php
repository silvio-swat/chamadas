    <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
    <div x-data="{ isOpen: {{ $modalForm == 'Permission' ? 'true' : 'false' }}  }">
      
      <!-- overlay transition-opacity transition-transform  -->
      <div 
      x-show="isOpen" x-cloak
      x-transition:enter="transition duration-300 transform"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition duration-300 transform"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      id="modal_overlay" class="modal--form-back">
      
        <!-- modal -translate-y-full scale-150  -->
        <div id="modal" class="modal--form">
        
          <button 
            @click="isOpen = false"
            wire:click="setFormClose()"
            class="modal--close--button">
            &cross;
          </button>
      
          <!-- header -->
          <div class="modal--header">
            <h2 class="modal--h2">{{$formTitle}}</h2>
          </div>
      
          <!-- body -->
          <div class="modal--body">

            <form class="modal--form-class" wire:submit.prevent="submit({{$permissionModel}}, 'Permission')">

              <div class="modal--form-input-div-1">                
                <div class="modal--form-input-div-2">
                  <label class="modal--form-label" for="grid-state">
                    Tipo(*)
                  </label>
                  <div class="relative">
                    <select wire:model="permissionModel.type" class="modal--form-select" id="permissionModel_type">
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
                    <select wire:model="permissionModel.menu" class="modal--form-select">
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
                    <select wire:model="permissionModel.controller" class="modal--form-select" id="permissionModel_controller">
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
                  <input wire:model="permissionModel.method" class="modal--form-input" type="text" placeholder="Digite o nome do Método">
                    @error('permissionModel.method') <span class="error">{{ $message }}</span> @enderror
                  <p class="modal--form-p-error"></p>
                </div>
              </div>

              <div class="modal--form-input-div-1">
                <div class="modal--form-input-div-2">
                  <label class="modal--form-label" for="grid-password">
                    Descrição
                  </label>
                  <textarea wire:model="permissionModel.description" class="modal--form-text" 
                    id="grid-password" type="text" placeholder="Descrição da permissão">
                  </textarea>
                  @error('permissionModel.description') <span class="error">{{ $message }}</span> @enderror
                  <p class="modal--form-p-error"></p>
                </div>
              </div>  

            </div>
        
            <!-- footer -->
            <div class="modal--form-footer">
            <button class="modal--form-save-button" type="submit">Save</button>

          </form>
              <!-- onclick="openModal(false)" -->
              <button 
                  @click="isOpen = false"
                  wire:click="setFormClose()"
                  class="delete--button"
              >Close</button>
            </div>
        </div>
      </div>
    </div>