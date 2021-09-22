  <div class="modal--form-input-div-1" x-data="{ isOpen: {{ $render ?? 'true' }} }">                
    <div class="modal--form-input-div-2" x-show="isOpen">
      <label class="modal--form-label" for="grid-state">
        {{ $label }}
      </label>
      <div class="relative">
        <select wire:model="{{ $modelField }}" class="modal--form-select" id="{{str_replace('.', '-', $modelField)}}">
          @foreach ($selectItems as $item)
            <option value="{{$item['value']}}">{{$item['descri']}}</option>
          @endforeach
        </select>
        @error($modelField) <span class="error">{{ $message }}</span> @enderror
        <div class="modal--form-select-svg">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
  </div>

