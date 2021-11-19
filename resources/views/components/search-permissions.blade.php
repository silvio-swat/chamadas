@php
    $inputId = $elementId ?? str_replace('.', '-', $fieldName);
@endphp

{{-- <div class="relative"> --}}
  <x-sis-input label="{{$labelName}}" modelField='{{$fieldName}}' placeHolder='Digite uma busca'
    />
{{-- <div id="userList" class="absolute w-full bg-white rounded-lg shadow-lg top-16">
      </div> --}}
{{-- </div> --}}

@push('custom-scripts')
  @once
    <script>
  $(document).ready(function(){
    var _token = $('input[name="_token"]').val();
    $('#{{ $inputId }}').autocomplete({
      source: function(request, response) {
          $.ajax({
            url: '{{ route('user-autocomplete') }}',
            method: "POST",
            dataType : "json",
            data: {
              query:  request.term,
              _token: _token
            },
            success: function(data){
              response(data);
            }
          })            
        },
        select: function(event, ui){
          @if(isset($autoFields))
              @foreach($autoFields as $key => $val)
                @this.set("{{$key}}", ui.item.{{ $val }});
              @endforeach
          @endif
          return false;
        }
      });
    });
    </script>
    @endonce
@endpush