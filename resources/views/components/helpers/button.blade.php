<div class="py-3">
    <button
      wire:click="{{$method ?? 'new()'}}"
      class="{{$class ?? 'new--button'}}">
        <i class="fa fa-{{$icon ?? 'plus'}}"></i>
      <span>{{$label ?? 'Novo'}}</span>
    </button>
</div>  