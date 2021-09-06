<div>
    @if($acao == 'cadastrar')
        <h3>Adicionar um novo nome</h3>
    @else
        <h3>Editar nome cadastrado</h3>
    @endif

    <input type="text" wire:model="item">
    @if($acao == 'cadastrar')
        <button wire:click="add()">Adicionar</button>
    @else
        <button wire:click="add()">Atualizar</button>
    @endif
    
    <button wire:click="resetList()">Limpar</button>
    <br /><br />
    <table>
        <tr>
            <th>
                Nome
            </th>
            <th>
                Ação
            </th>
        </tr>
        @foreach($listaNomes as $key => $nome)        
        <tr>
            <td>
                <span>{{ $nome }}</span>
            </td>
            <td>
                <button wire:click="delete({{$key}})">X</button>
                <button wire:click="edit({{$key}})">Edit</button>
            </td>
        </tr>
        @endforeach        
    </table>   
    
    












    <div>
        <x-slot name="header">
        
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Papeis de Usuários') }}
                </h2>
                <div>
                <button wire:$toggle='testeR()'>Teste</button>
                <button wire:click="testeR()">Teste 2</button>
                </div>
                
                <div class="flex flex-col my-5">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="modal--table-div">
        
                        <table class="modal--table">
                          <thead class="modal--table-thead">
                            <tr>
                              <th scope="col" class="modal--table-th">
                                Nome de Exibição
                              </th>
                              <th scope="col" class="modal--table-th">
                                Papel
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
                
                            @foreach($roles as $role)        
                            <tr class="modal--table-tr">
                
                                <td class="modal--table-td">
                                    <span>{{ $role->display_name }}</span>
                                </td>
                
                                <td class="modal--table-td">
                                    <span>{{ $role->name }}</span>
                                </td>     
                                
                                <td class="modal--table-td">
                                  <button wire:click="editR({{$role->id}})">Edit</button>
                                  {{-- <a href="#" wire:click="edit({{$role->id}})" class="text-indigo-600 hover:text-indigo-900">Edit</a> --}}
                                </td>  
                                <td class="modal--table-td">
                                  <button wire:$toggle='deleteR({{$role->id}})'>X</button>
                                  {{-- <a href="#" wire:click="delete({{$role->id}})" class="text-red-600 hover:text-indigo-900">Delete</a> --}}
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
                
                
                
                
                {{-- <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
                <!-- onclick="openModal(true)" -->
                <div x-data="{ isOpen: false }">
                  <div class="p-3">
                      <button  class="modal--form-save-button"
                        @click="isOpen = true"
                      >
                        Open Modal
                      </button>
                  </div>
                  
                  <!-- overlay transition-opacity transition-transform  -->
                  <div 
                  x-show="isOpen" 
                  x-transition:enter="transition duration-300 transform"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition duration-300 transform"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  id="modal_overlay" class="absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">
                  
                    <!-- modal -translate-y-full scale-150  -->
                    <div id="modal" 
                
                    class="pacity-0 transform relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg">
                    
                        <!-- button close 
                          onclick="openModal(false)"-->
                        <button 
                          @click="isOpen = false"
                          class="modal--close--button">
                          &cross;
                        </button>
                    
                        <!-- header -->
                        <div class="modal--header">
                        <h2 class="modal--h2">Title</h2>
                        </div>
                    
                        <!-- body -->
                        <div class="w-full p-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, quis tempora! Similique, explicabo quaerat maxime corrupti tenetur blanditiis voluptas molestias totam? Quaerat laboriosam suscipit repellat aliquam blanditiis eum quos nihil.
                        </div>
                    
                        <!-- footer -->
                        <div class="modal--form-footer">
                        <button class="modal--form-save-button">Save</button>
                        <!-- onclick="openModal(false)" -->
                        <button 
                            @click="isOpen = false"
                            class="delete--button"
                        >Close</button>
                        </div>
                    </div>
                  
                  </div>
                
                </div> --}}
              </x-slot>
        </div>


















</div>
