<thead class="modal--table-thead">
    <tr class={{$trClass}}>
        @if($acao == 'start')
            <th scope="col" class="{{$thClass}}">
                <span>Ação</span>
            </th>  
        @endIf           
        @foreach ($items as $item => $val)
            <th scope="col" class="{{$thClass}}">
                {{ $val }}
            </th>
        @endforeach
        @if($acao == 'end')
            <th scope="col" class="{{$thClass}}">
                <span>Ação</span>
            </th>
        @endIf          
    </tr>
</thead>
<tbody class="modal--table-tbody">