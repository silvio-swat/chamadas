<!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
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
    <div id="modal" class="modal--form  {{ $w ?? 'w-5/6'}}">
    
        <button 
          @click="isOpen = false"
          wire:click="setFormClose()"
          class="modal--close--button">
          &cross;
        </button>
    
        <!-- header -->
        <div class="modal--header">
          <h2 class="modal--h2">{{$formTitle ?? 'Sem titulo'}}</h2>
        </div>
    
        <!-- body -->
        <div class="modal--body">
          <form class="modal--form-class" wire:submit.prevent="{{$method ?? 'submit'}}({{$$model}}, '{{$formType}}')" autocomplete="off">
            @csrf
            <div class="overflow-hidden">
              <div class="grid grid-cols-{{ $cols ?? 1 }} gap-{{ $spaces ?? 4 }}">