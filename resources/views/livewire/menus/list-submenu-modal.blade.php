      <!-------------------------------   HTML do modal do form ---------------------------->
      <!-- onclick="openModal(true)" -->
      <div x-data="{ isOpenSubMenuList: {{ $modalListSMOpen }} }">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
          x-show="isOpenSubMenuList" x-cloak
          x-transition:enter="transition duration-300 transform"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition duration-300 transform"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          id="modal_overlay" class="modal--back--screen">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" class="modal--list">
              <button 
                @click="isOpenSubMenuList = false"
                wire:click="setListClose('SubMenu')"
                class="modal--close--button">
                &cross;
              </button>
          
              <!-- header -->
              <div class="modal--header">
              <h2 class="modal--h2">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="modal--body">

                <div class="modal--body-div">
                  <div class="py-2 ">
                    <button
                      wire:click="newSubMenu({{$menuId}})"
                      class="new--button">
                      <i class="fa fa-plus"></i>
                      <span>New subMenu</span>
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
                                Controller
                              </th>
                              <th scope="col" class="modal--table-th">
                                Action
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
                
                            @foreach($subMenus as $subMenu)        
                            <tr class="modal--table-tr">
                                <td class="modal--table-td">
                                    <span>{{ $subMenu->name }}</span>
                                </td>
                
                                <td class="modal--table-td">
                                    <span>{{ $subMenu->order }}</span>
                                </td>   
                                
                                <td class="modal--table-td">
                                  <span>{{ $subMenu->controller }}</span>
                                </td>
                                
                                <td class="modal--table-td">
                                  <span>{{ $subMenu->action }}</span>
                                </td>  
                                
                                <td class="modal--table-td">
                                  <span><i class="{{ $subMenu->icon  }}"></i> {{ $subMenu->icon }}</span>
                                </td>                                   
                                
                                <td class="modal--table-td">
                                  <button wire:click="edit({{$subMenu->id}}, 'SubMenu')"><i class="fa fa-edit fa-lg"></i></button>
                                </td>  
                                <td class="modal--table-td">
                                  <button wire:click="delete({{$subMenu->id}}, 'SubMenu')"><i class="fa fa-trash fa-lg"></i></button>
                                </td>                                
                            </tr>        
                            @endforeach    
                            <!-- More people... -->
                          </tbody>
                        </table>
                      
                      </div>

                <!-- onclick="openModal(false)" -->
                <button 
                    @click="isOpenSubMenuList = false"
                    wire:click="setListClose('SubMenu')"
                    class="delete--button"
                >Close
                </button>
              </div>
          </div>
        </div>
      </div>