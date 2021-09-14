<div>
    <div class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Parametros') }}
        </h2>
  
      </div>
    </div>
  
  <div class="modal--body-div">
    <div class="py-3 ">
      <button
        wire:click="new()"
        class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
        active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
          <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                  C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                  C15.952,9,16,9.447,16,10z" />
        </svg>
        <span>Novo</span>
      </button>
    </div>   
  
      <div class="flex flex-col my-3">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="modal--table-div">
  
              <table class="modal--table">
                <thead class="modal--table-thead">
                  <tr>
                    <th scope="col" class="modal--table-th">
                      ID
                    </th>                    
                    <th scope="col" class="modal--table-th">
                      Chave
                    </th>
                    <th scope="col" class="modal--table-th">
                      Itens
                    </th>
                    <th scope="col" class="modal--table-th">
                      <span class="sr-only">Editar</span>
                    </th>
                    <th scope="col" class="modal--table-th">
                      <span class="sr-only">Excluir</span>
                    </th>              
                  </tr>
                </thead>

                <tbody class="modal--table-tbody">
                  @foreach($params as $param)        
                  <tr class="modal--table-tr">
                      <td class="modal--table-td">
                          <span>{{ $param->id}}</span>
                      </td>
                      <td class="modal--table-td">
                          <span>{{ $param->chave }}</span>
                      </td>     
  
                      <td class="modal--table-td">
                        <div class="py-3 ">
                          <button
                            wire:click="newItem({{ $param->id}}, 'ParamItem')"
                            class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
                            active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                            <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                              <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                                      C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                                      C15.952,9,16,9.447,16,10z" />
                            </svg>
                            <span>Novo Item</span>
                          </button>
                        </div>

                        <table class="modal--table">
                          <thead class="modal--table-thead">
                            <tr>
                              <th scope="col" class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Conteudo 
                              </th>
                              <th scope="col" class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descrição
                              </th>
                              <th scope="col" class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Edit</span>
                              </th>
                              <th scope="col" class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Excluir</span>
                              </th>              
                            </tr>
                          </thead>

                          <tbody class="modal--table-tbody">
                          @foreach($param->paramItems as $item)        
                          <tr class="modal--table-tr">
                              <td class="px-3 py-2 whitespace-nowrap">
                                  {{ $item->conteudo}}
                              </td>
                              <td class="px-3 py-2 whitespace-nowrap">
                                  {{ $item->descricao }}
                              </td>     
                              <td class="px-3 py-2 whitespace-nowrap">
                                <button wire:click="edit({{$item->id}}, 'ParamItem')"><i class="fa fa-edit fa-lg"></i></button>
                              </td>  
                              <td class="px-3 py-2 whitespace-nowrap">
                                <button wire:click="delete({{$item->id}}, 'ParamItem')"><i class="fa fa-trash fa-lg"></i></button>
                              </td>                                
                          </tr>        
                          @endforeach  
                        </table>
                      </td>                             
                      
                      <td class="modal--table-td">
                        <button wire:click="edit({{$param->id}}, 'Param')"><i class="fa fa-edit fa-lg"></i></button>
                      </td>  
                      <td class="modal--table-td">
                        <button wire:click="delete({{$param->id}}, 'Param')"><i class="fa fa-trash fa-lg"></i></button>
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
      
      @include('livewire.params.form-param-modal')
      @include('livewire.params.form-param-item-modal')      
      @include('layouts.delete-modal')      
  
    </div>
  </div>    
  
          
          
  