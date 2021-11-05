
@if($tipo == "checkbox")
    <div class="modal--form-input-div-1">
        <div class="modal--form-input-div-2">
            <div>
            <label class="modal--form-label">
                <span class="ml-2">{{ $label }}</span>
            </label>
            <input wire:model="{{ $modelField }}" {{ $method }} {{ $method2 }} type="checkbox" class="form-checkbox ml-4" 
                id="{{$elementId ?? str_replace('.', '-', $modelField)}}" {{ $disabled }}>
            @error($modelField) <span class="error">{{ $message }}</span> @enderror
            <p class="modal--form-p-error"></p>
            </div>
        </div>
    </div> 
@endIf   
  
@if($tipo == "password")
    <div class="modal--form-input-div-1">
        <div class="modal--form-input-div-2">
            <label class="modal--form-label" for="grid-password">
            {{ $label }}
            </label>
            <input wire:model="{{ $modelField }}" {{ $method }} {{ $method2 }}  class="modal--form-input"
            id="{{$elementId ?? str_replace('.', '-', $modelField)}}" type="password" placeholder="{{ $placeHolder}}"
            {{ $disabled }}>
            @error($modelField) <span class="error">{{ $message }}</span> @enderror
            <p class="modal--form-p-error"></p>     
        </div>
    </div>
@endIf

@if($tipo == "select")
    <div class="modal--form-input-div-1" {{ $show }}>
        <div class="modal--form-input-div-2">
            <label class="modal--form-label" for="grid-state">
                {{ $label }}
            </label>
            <div class="relative">
                <select wire:model="{{ $modelField }}" {{ $method }} {{ $method2 }}  
                    class="modal--form-select" id="{{$elementId ?? str_replace('.', '-', $modelField)}}">
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
@endIf

@if($tipo == "text")
    <div class="modal--form-input-div-1" {{ $disabled ?? ''}}>
        <div class="modal--form-input-div-2">
            <label class="modal--form-label" for="grid-password">
                {{ $label }}
            </label>
            <input wire:model="{{ $modelField }}" {{ $method }} {{ $method2 }} class="modal--form-input"
            id="{{$elementId ?? str_replace('.', '-', $modelField)}}" type="{{ $type ?? 'text'}}" placeholder="{{ $placeHolder}}"
            name = "{{$elementId ?? $modelField}}"
            {{ $disabled ?? ''}}>
            @error($modelField) <span class="error">{{ $message }}</span> @enderror
            <p class="modal--form-p-error"></p>     
        </div>
    </div>
@endIf

