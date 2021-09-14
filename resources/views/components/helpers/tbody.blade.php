
    <tr class="modal--table-tr">
        @if(isset($acao) and $acao = 'start')
            @if(isset($id) and !isset($lambda))
                <td class="modal--table-td">
                    <button title="Editar" wire:click="edit({{$id}})"><i class="fa fa-edit fa-xl mx-1"></i></button>

                    <button title="Excluir" wire:click="delete({{$id}})"><i class="fa fa-trash fa-xl mx-1"></i></button>
                </td>
            @endIf  
            @if(isset($lambda))
                <td class="modal--table-td">
                    {!! $lambda !!}
                </td>
            @endIf       
        @endIf   


        @if(isset($items) and !empty($items))
            @foreach($items as $item => $val)        
                <td class="modal--table-td">
                    <span>{!! $val !!}</span>
                </td>        
            @endforeach 
        @endIf
        
        @if(!isset($acao))
            @if(isset($id) and !isset($lambda))
                <td class="modal--table-td">
                    <button title="Editar" wire:click="edit({{$id}})"><i class="fa fa-edit fa-xl mx-1"></i></button>

                    <button title="Excluir" wire:click="delete({{$id}})"><i class="fa fa-trash fa-xl mx-1"></i></button>
                </td>
            @endIf  
            @if(isset($lambda))
                <td class="modal--table-td">
                    {!! $lambda !!}
                </td>
            @endIf       
        @endIf                             
    </tr>       

