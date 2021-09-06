      <!-------------------------------   HTML do modal do form ---------------------------->
      <!-- onclick="openModal(true)" -->
      <div x-data="{ isOpenPageList: {{ $modalListPageOpen }} }">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
        x-show="isOpenPageList" x-cloak
        x-transition:enter="transition duration-300 transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="modal_overlay" class="modal--back--screen">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" class="modal--list">
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenPageList = false"
                wire:click="setListClose('Page')"
                class="modal--close--button ">
                &cross;
              </button>
          
              <!-- header -->
              <div class="modal--header w-full">
                <h2 class="modal--h2">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="modal--body w-full">
                <div class="modal--body-div w-full">
                  <div class="py-2 ">
                    <button
                      wire:click="new()"
                      class="new--button">
                      <i class="fa fa-plus"></i>
                      <span>New menuPage</span>
                    </button>
                  </div>  

                {{-- Tabela com a listagem de páginas cadastradas --}}
                <div class="modal--table-div">
      
                  <table class="modal--table">
                    <thead class="modal--table-thead">
                      <tr>
                        <th scope="col" class="modal--table-th">
                          Nome
                        </th>
                        <th scope="col" class="modal--table-th">
                          Ordem
                        </th>
                        <th scope="col" class="modal--table-th">
                          Icone
                        </th>
                        <th scope="col" class="modal--table-th">
                          <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="modal--table-th">
                          <span class="sr-only">Excluir</span>
                        </th>              
                      </tr>
                    </thead>
                    <tbody class="modal--table-tbody">
          
                      @foreach($menuPages as $menuPage)        
                      <tr class="modal--table-tr">
                          <td class="modal--table-td">
                              <span>{{ $menuPage->name }}</span>
                          </td>
                          <td class="modal--table-td">
                              <span>{{ $menuPage->order }}</span>
                          </td>    
                          <td class="modal--table-td">
                            <span><i class="{{ $menuPage->icon  }}"></i> {{ $menuPage->icon }}</span>
                          </td>                                 
                          <td class="modal--table-td">
                            <button wire:click="edit({{$menuPage->id}}, 'Page')"><i class="fa fa-edit fa-lg"></i></button>
                          </td>  
                          <td class="modal--table-td">
                            <button wire:click="delete({{$menuPage->id}}, 'Page')"><i class="fa fa-trash fa-lg"></i></button>
                          </td>                                
                      </tr>        
                      @endforeach    
                      <!-- More people... -->
                    </tbody>
                  </table>
                
                </div>

                <button 
                  @click="isOpenPageList = false"
                  wire:click="setListClose('Page')"
                  class="delete--button"
                  >Close
                </button>
              </div>
          </div>
        </div>
      </div>