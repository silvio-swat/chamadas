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
        id="modal_overlay" class="absolute inset-0 overflow-scroll bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
        
          <!-- modal -translate-y-full scale-150  -->
          <div id="modal" 
      
          class="m-auto transform relative w-10/10 md:w-3/4 bg-white rounded shadow-lg">
          
              <!-- button close 
                onclick="openModal(false)"-->
              <button 
                @click="isOpenSubMenuList = false"
                wire:click="setListClose('SubMenu')"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                &cross;
              </button>
          
              <!-- header -->
              <div class="px-4 py-3 border-b border-gray-200">
              <h2 class="text-xl font-semibold text-gray-600">{{$formTitle}}</h2>
              </div>
          
              <!-- body -->
              <div class="w-full p-20">

                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                  <div class="py-2 ">
                    <button
                      wire:click="newSubMenu({{$menuId}})"
                      class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
                      active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                      <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                        <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                                C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                                C15.952,9,16,9.447,16,10z" />
                      </svg>
                      <span>New subMenu</span>
                    </button>
                  </div>  

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
                                Ordem
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Controller
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                              </th>   
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Icone
                              </th>                                 
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Edit</span>
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Excluir</span>
                              </th>              
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                
                            @foreach($subMenus as $subMenu)        
                            <tr class="bg-emerald-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span>{{ $subMenu->name }}</span>
                                </td>
                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span>{{ $subMenu->order }}</span>
                                </td>   
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span>{{ $subMenu->controller }}</span>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span>{{ $subMenu->action }}</span>
                                </td>  
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <span><i class="{{ $subMenu->icon  }}"></i> {{ $subMenu->icon }}</span>
                                </td>                                   
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <button wire:click="edit({{$subMenu->id}}, 'SubMenu')">Edit</button>
                                  {{-- <a href="#" wire:click="edit({{$menu->id}})" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                </td>  
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <button wire:click="delete({{$subMenu->id}}, 'SubMenu')">X</button>
                                  {{-- <a href="#" wire:click="delete({{$menu->id}})" class="text-red-600 hover:text-indigo-900">Delete</a> --}}
                                </td>                                
                            </tr>        
                            @endforeach    
                            <!-- More people... -->
                          </tbody>
                        </table>
                      
                      </div>
                    </div>
                  </div>
                </div> 
  

                <!-- onclick="openModal(false)" -->
                <button 
                    @click="isOpenSubMenuList = false"
                    wire:click="setListClose('SubMenu')"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none"
                >Close
                </button>
              </div>
          </div>
        </div>
      </div>