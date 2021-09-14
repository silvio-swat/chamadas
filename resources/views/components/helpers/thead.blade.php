<thead class="modal--table-thead">
    <tr>
        @if(isset($acao) and $acao == 'start')
            <th scope="col" class="modal--table-th">
                <span>Ação</span>
            </th>  
        @endIf           
        @foreach ($items as $item => $val)
            <th scope="col" class="modal--table-th">
                {{ $val }}
            </th>            
        @endforeach
        @if(!isset($acao) or $acao == 'end')
            <th scope="col" class="modal--table-th">
                <span>Ação</span>
            </th>  
        @endIf          
    </tr>
</thead>
<tbody class="modal--table-tbody">