      <!-------------------------------   HTML do modal do form ---------------------------->
      <div x-data="{ isOpenPageForm: {{ $modalFormPageOpen }} }">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
        x-show="isOpenPageForm" x-cloak
        x-transition:enter="transition duration-300 transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="modal_overlay" class="modal--form-back">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" class="modal--form">
          
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenPageForm = false"
                wire:click="setFormClose('MenuPage')"
                class="modal--close--button">
                &cross;
              </button>
          
              <!-- header -->
              <div class="modal--header">
              <h2 class="modal--h2">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="modal--body">
  
                <form class="modal--form-class" wire:submit.prevent="submit({{$menuPageModel}}, 'MenuPage')">
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Nome Exibição
                        </label>
                        <input wire:model="menuPageModel.name" class="modal--form-input"
                          id="menuModel_name" type="text" placeholder="Digite o nome de exibição">
                          @error('menuPageModel.name') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>
  
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Ordem
                        </label>
                        <input wire:model="menuPageModel.order" class="modal--form-input" type="number"
                          placeholder="Número para ordenar a exibição">
                        @error('menuPageModel.order') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>   
                    
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-state">
                          Icone
                        </label>
                        <div class="relative">
                          <select wire:model="menuPageModel.icon"  class="modal--form-select">
                            <option value="">Selecione um ícone</option>
                            @foreach ($iconsArray['solid'] as $item)
                              <option data-content="<i class='fa fa-{{$item}}'></i>" value="fa fa-{{$item}}">{{$item}}</option>
                            @endforeach
                          </select>
                          @error('menuPageModel.icon') <span class="error">{{ $message }}</span> @enderror
                          <div class="modal--form-select-svg">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                          </div>
                        </div>
                      </div>    
                    </div>    
                    
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-state">
                          Permission
                        </label>
                        <div class="relative">
                          <select wire:model="menuPageModel.permission_id" class="modal--form-select">
                            @foreach ($selPermissions as $item)
                              <option value="{{$item['value']}}">{{$item['descri']}}</option>
                            @endforeach
                          </select>
                          @error('menuPageModel.permission_id"') <span class="error">{{ $message }}</span> @enderror
                          <div class="modal--form-select-svg">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
          
              <!-- footer -->
              <div class="modal--form-footer">
              <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded 
              text-white focus:outline-none" type="submit">Save</button>
  
            </form>
                <button 
                  @click="isOpenPageForm = false"
                  wire:click="setFormClose('MenuPage')"
                  class="delete--button"
                  >Close
                </button>
              </div>
          </div>
        </div>
      </div>