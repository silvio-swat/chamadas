      <!-------------------------------   HTML do modal do form ---------------------------->
      <div x-data="{ isOpenSMForm: {{ $modalFormSMOpen }} }">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
          x-show="isOpenSMForm" x-cloak
          x-transition:enter="transition duration-300 transform"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition duration-300 transform"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          id="modal_overlay" class="modal--form-back">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" 
      
          class="modal--form" >
              <button 
                @click="isOpenSMForm = false"
                wire:click="setFormClose('SubMenu')"
                class="modal--close--button">
                &cross;
              </button>
          
              <!-- header -->
              <div class="modal--header">
                <h2 class="modal--h2">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="modal--body">
  
                <form class="modal--form-class" wire:submit.prevent="submit({{$subMenuModel}} , 'SubMenu')">
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Nome Exibição
                        </label>
                        <input wire:model="subMenuModel.name" class="modal--form-input"
                          id="subMenuModel_name" type="text" placeholder="Digite para exibição">
                          @error('subMenuModel.name') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>
  
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Ordem
                        </label>
                        <input wire:model="subMenuModel.order" class="modal--form-input" id="subMenuModel_order" type="number">
                        @error('subMenuModel.order') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>         
                    
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Controller
                        </label>
                        <input wire:model="subMenuModel.controller" class="modal--form-input" id="subMenuModel_controller" type="text">
                        @error('subMenuModel.controller') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>   
                    
                    <div class="modal--form-input-div-1">
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-password">
                          Action
                        </label>
                        <input wire:model="subMenuModel.action" class="modal--form-input"
                          id="subMenuModel_action" type="text" placeholder="Digite para exibição">
                          @error('subMenuModel.action') <span class="error">{{ $message }}</span> @enderror
                        <p class="modal--form-p-error"></p>
                      </div>
                    </div>  
                    
                    <div class="modal--form-input-div-1">                
                      <div class="modal--form-input-div-2">
                        <label class="modal--form-label" for="grid-state">
                        Icone
                      </label>
                      <div class="relative">
                        <select wire:model="subMenuModel.icon" class="modal--form-select">
                          @foreach ($iconsArray['solid'] as $item)
                            <option data-content="<i class='fa fa-{{$item}}'></i>" value="fa fa-{{$item}}"> {{$item}}</option>
                          @endforeach
                        </select>
                        @error('subMenuModel.icon') <span class="error">{{ $message }}</span> @enderror
                        <div class="modal--form-select-svg">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
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
                          <select wire:model="subMenuModel.permission_id" class="selectpicker block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none 
                          focus:bg-white focus:border-gray-500" id="menuPageModel_permission_id">
                            <option value="">Escolha o Menu (Crie primeiro)</option>
                            @foreach ($selPermissions as $item)
                              <option value="{{$item['value']}}">{{$item['descri']}}</option>
                            @endforeach
                          </select>
                          @error('subMenuModel.permission_id"') <span class="error">{{ $message }}</span> @enderror
                          <div class="modal--form-select-svg">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
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
                <!-- onclick="openModal(false)" -->
                <button 
                    @click="isOpenSMForm = false"
                    wire:click="setFormClose('SubMenu')"
                    class="delete--button"
                >Close</button>
              </div>
          </div>
        </div>
      </div>