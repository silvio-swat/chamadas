      <!-------------------------------   HTML do modal do form ---------------------------->
      <!-- onclick="openModal(true)" -->
      <div x-data="{ isOpenListIcons: {{ $modalListIconsOpen }}}">
        
        <!-- overlay transition-opacity transition-transform  -->
        <div 
        x-show="isOpenListIcons" x-cloak
        x-transition:enter="transition duration-300 transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300 transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        id="modal_overlay" class="flex justify-center absolute inset-0 overflow-scroll bg-black bg-opacity-30 w-full items-start md:items-center pt-10 md:pt-0">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" 
      
          class="m-auto transform relative w-10/10 md:w-3/4 bg-white rounded shadow-lg">
          
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenListIcons = false"
                wire:click="setListClose('Icons')"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                &cross;
              </button>
          
              <!-- header -->
              <div class="px-4 py-3 border-b border-gray-200">
              <h2 class="text-xl font-semibold text-gray-600">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="w-full p-20">

                {{-- Tabela com a listagem de páginas cadastradas --}}
                <div class="flex flex-col my-3">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nome
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Icone
                              </th>                                                                      
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                          @foreach($iconsArray['solid'] as $item)
                            <tr class="bg-emerald-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span>{{$item}}</span>
                                </td>
                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span><i class='fa fa-{{$item}} fa-lg'></i></span>
                                </td>   
                                                              
                            </tr>                             
                          @endforeach                          

                          </tbody>
                        </table>
                      
                      </div>
                    </div>
                  </div>
                </div> 
  

                <!-- onclick="openModal(false)" -->
                <button 
                    @click="isOpenListIcons = false"
                    wire:click="setListClose('Icons')"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
                >Close
                </button>
              </div>
          </div>
        </div>
      </div>