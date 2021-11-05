<tr class="{{ $trClass }}">
    @if($acao == 'start')
        @if(!$lambda)
            <td class="{{ $tdClass }}">
                <button title="Editar" wire:click="edit({{$id}}, {{$modelName}})"><i class="fa fa-edit fa-xl mx-1"></i></button>
                <button title="Excluir" wire:click="delete({{$id}}, {{$modelName}})"><i class="fa fa-trash fa-xl mx-1"></i></button>
            </td>
        @endIf
        @if($lambda)
            <td class="{{ $tdClass }}">
                {!! $lambda !!}
            </td>
        @endIf
    @endIf   


    @if($items)
        @foreach($items as $item => $val)
            <td class="{{ $tdClass }}">
                <span>{!! $val !!}</span>
            </td>
        @endforeach
    @endIf
    
    @if($acao == 'end')
        @if(!$lambda)
            <td class="{{ $tdClass }}">
                <button title="Editar" wire:click="edit({{$id}}, '{{$modelName}}')"><i class="fa fa-edit fa-xl mx-1"></i></button>

                <button title="Excluir" wire:click="delete({{$id}}, '{{$modelName}}')"><i class="fa fa-trash fa-xl mx-1"></i></button>
            </td>
        @endIf  
        @if($lambda)
            <td class="{{ $tdClass }}">
                {!! $lambda !!}
            </td>
        @endIf
    @endIf     
</tr>     