      <!-------------------------------   HTML do modal do form ---------------------------->
      <!-- onclick="openModal(true)" -->
      <div x-data="{ isOpenListIcons: {{ $modalList == 'Icons' ? 'true' : 'false' }}}">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
        x-show="isOpenListIcons" x-cloak
        x-transition:enter="transition duration-300 transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="modal_overlay" class="modal--back--screen">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" 
      
          class="modal--list">
          
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenListIcons = false"
                wire:click="setListClose('Icons')"
                class="modal--close--button">
                &cross;
              </button>
          
              <!-- header -->
              <div class="modal--header">
              <h2 class="modal--h2">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="modal--body">
                {{-- Tabela com a listagem de páginas cadastradas --}}
                      <div class="modal--table-div">
            
                        <table class="modal--table">
                          <thead class="modal--table-thead">
                            <tr>
                              <th scope="col" class="modal--table-th">
                                Nome
                              </th>
                              <th scope="col" class="modal--table-th">
                                Icone
                              </th>                                                                      
                            </tr>
                          </thead>
                          <tbody class="modal--table-tbody">
                          @foreach($iconsArray['solid'] as $item)
                            <tr class="modal--table-tr">
                                <td class="modal--table-td">
                                    <span>{{$item}}</span>
                                </td>
                                <td class="modal--table-td">
                                    <span><i class='fa fa-{{$item}} fa-lg'></i></span>
                                </td>   
                            </tr>                             
                          @endforeach                          

                          </tbody>
                        </table>
                      
                      </div>

                <!-- onclick="openModal(false)" -->
                <button 
                    @click="isOpenListIcons = false"
                    wire:click="setListClose('Icons')"
                    class="delete--button"
                >Close
                </button>
              </div>
          </div>
        </div>
      </div>