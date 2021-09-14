<div class="modal--form-input-div-1">
  <div class="modal--form-input-div-2">
    <div>
      <label class="modal--form-label">
        <span class="ml-2">{{ $label }}</span>
      </label>
      <input wire:model="{{ $modelField }}" type="checkbox" class="form-checkbox ml-4" 
        id="{{str_replace('.', '-', $modelField)}}" {{ $disabled ?? ''}}>
      @error($modelField) <span class="error">{{ $message }}</span> @enderror
      <p class="modal--form-p-error"></p>           
    </div>
  </div>
</div>     
