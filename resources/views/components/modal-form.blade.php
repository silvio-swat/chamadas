@if($acao == "open")
    <!-------------------------------   HTML abre form de modal -------------------------->
    <!-- onclick="openModal(true)" -->

    <div x-data="{ isOpen: {{ $modalForm == $formType ? 'true' : 'false' }}  }">
    
        <!-- overlay transition-opacity transition-transform  -->
        <div 
            x-show="isOpen" x-cloak
            x-transition:enter="transition duration-300 transform"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition duration-300 transform"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            id="modal_overlay" class="modal--form-back">
        
        <!-- modal -translate-y-full scale-150  -->
        <div id="modal" class="modal--form  {{ $width }}">
        
            <button 
                @click="isOpen = false"
                wire:click="setFormClose()"
                class="modal--close--button">
                &cross;
            </button>
        
            <!-- header -->
            <div class="modal--header">
                <h2 class="modal--h2">{{$formTitle}}</h2>
            </div>
        
            <!-- body -->
            <div class="modal--body">
                <form class="modal--form-class" wire:submit.prevent="{{$method}}({{$$model}}, '{{$formType}}')">
                @csrf
                <div class="overflow-hidden">
                    <div class="grid grid-cols-{{ $cols }} gap-{{ $spaces }}">
@endIf


@if($acao == "close")
                </div>
                </div>                      
            </div>
            <!-- footer -->
            <div class="modal--form-footer">
            <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded 
            text-white focus:outline-none" type="submit">{{ $saveLabel }}</button>

            </form>
            <!-- onclick="openModal(false)" -->
            <button 
                @click="isOpen = false"
                wire:click="setFormClose()"
                class="delete--button"
            >Close</button>
            </div>
        </div>
    </div>
    </div>
@endIf