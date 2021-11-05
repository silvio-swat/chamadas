<div class="modal--form-input-div-1">
    <div class="modal--form-input-div-2">
      <label class="modal--form-label" for="grid-password">
        {{ $label }}
      </label>
      <input wire:model="{{ $modelField }}" class="modal--form-input"
        id="{{str_replace('.', '-', $modelField)}}" type="{{ $type ?? 'text'}}" placeholder="{{ $placeHolder}}"
        {{ $disabled ?? ''}}>
        @error($modelField) <span class="error">{{ $message }}</span> @enderror
        <p class="modal--form-p-error"></p>     
    </div>
</div>
