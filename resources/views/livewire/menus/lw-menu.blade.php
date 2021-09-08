<div>
    <div class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar menus') }}
        </h2>
      </div>
    </div>
      

    <div class="py-3 mx-3">
      <button
        wire:click="list('MenuPage')"
        class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
        active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
        <i class="fa fa-list"></i>
        <span>Listar Pages</span>
      </button>

      <button
        wire:click="list('Icons')"
        class="relative text-white px-3 w-auto h-10 bg-blue-600 rounded-full hover:bg-blue-700
        active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
        <i class="fa fa-list"></i>
        <span>Lista de Icones</span>
      </button>      
    </div>      

{{-- Exibe as tabs de cada página cadastrada --}}
      <div x-data="{ openTab: {{isset($menuPages[0]) ? $menuPages[0]->id : 1}} }" class="p-6">
        <ul class="flex border-b">
          @foreach($menuPages as $menuPage)        
            <li @click="openTab = {{$menuPage->id}}" :class="{ '-mb-px': openTab === {{$menuPage->id}} }" class="-mb-px mr-1">
              <a :class="openTab === {{$menuPage->id}} ? 'border-l border-t border-r rounded-t text-blue-700' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                <i class="{{$menuPage->icon}}"></i> {{$menuPage->name}}
              </a>  
            </li>
          @endforeach  
        </ul>
        <div class="w-full pt-4">
          @foreach($menuPages as $menuPage)        
            <div x-show="openTab === {{$menuPage->id}}" x-cloak>

              <div class="py-2">
                <button
                  wire:click="list('Menu', {{$menuPage->id}})"
                  class="relative text-white px-3 w-auto h-8 bg-blue-600 rounded-full hover:bg-blue-700
                  active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                  <i class="fa fa-list"></i>
                  <span>List Menus</span>
                </button>
              </div>       

              {{-- Exibe os menus de cada página --}}
              <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-amber-50 to-amber-100 p-4">
                <div class="flex content-between flex-wrap  rounded-lg bg-stripes bg-stripes-amber-500">
                  @foreach($menuPage->menus->sortBy(
                    function($menu) {return $menu->order;})
                  as $menu)
                    <div class="w-1/4 p-2">
                      <div class="h-12 text-gray-700 text-2xl font-bold rounded-t-md flex items-center justify-center bg-yellow-400"><i class="{{$menu->icon}}"></i>&nbsp;{{ $menu->name}}</div>

                      @foreach($menu->subMenus->sortBy(
                        function($subMenu) {return $subMenu->order;})
                      as $subMenu)
                        <a href="{{url($subMenu->controller, $subMenu->action)}}">
                          <div class="border-2 border-gray-200 h-12 text-gray-500 text-1xl font-bold flex items-center justify-left bg-white"><span class="mx-3"><i class="{{$subMenu->icon}}"></i> {{$subMenu->name}}</span></div>                        
                        </a>
                      @endforeach

                      {{-- Exibe os submenus do menu --}}
                      <div class="py-2 mx-2">
                        <button
                          wire:click="list('SubMenu' , {{$menu->id}})"
                          class="relative text-white px-3 w-auto h-8 bg-blue-600 rounded-full hover:bg-blue-700
                          active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
                          <i class="fa fa-list"></i>
                        </button>
                      </div>  
                    </div>
                  @endforeach                  
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      
      @include('livewire.menus.list-awesome-icons')
      @include('layouts.delete-modal')
      {{-- Modal de Pages --}}
      @include('livewire.menus.form-page-modal')
      @include('livewire.menus.list-page-modal')

      {{-- Modal de Menus --}}
      @include('livewire.menus.form-menu-modal')
      @include('livewire.menus.list-menu-modal')    
      
      {{-- Modal de SubMenus --}}
      @include('livewire.menus.form-submenu-modal')
      @include('livewire.menus.list-submenu-modal')

    </div>
  </div>    