@if($acao == "open")
    <div class="modal--table-div {{ $size }}">
        <table class="{{$class}}">
@endIf

@if($acao == "close")
    </tbody>
    </table>
    </div>
@endIf