@if($acao == "open")
    <div class="grid grid-cols-{{ $cols }} gap-{{ $spaces }} {{ $class }}">
@endIf

@if($acao == "close")
    </div>
@endIf