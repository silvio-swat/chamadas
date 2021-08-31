<div>
    <br /><br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 d-flex flex-wrap flex-column">
                <div class="input-group">
                    <div class="input-group">
                        <input wire:model="username" type="text" class="form-control" wire:keydown.enter="search"
                        placeholder="Username github">
                        <br /><br />
                        <div class="input-group-append">
                            <button wire:loading.attr="disabled" wire:click="search" class="btn-outline-primary" type="button">
                                <span wire:loading wire:target="search" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Buscar
                            </button>
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <span>{{ $errors->first('username') }}</span>
                    @endif
                    @if (!$searchStatus && !$errors->has('username'))
                        <span>Usuário não encontrado</span>
                    @endif
                </div>
            </div>
            @if ($profile)
            <div class="card mt-3 shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{$profile['avatar_url']}}" alt="{{$profile['login']}}" 
                        class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $profile['login']}}</h5>
                            <p>{{ $profile['bio']}}</p>
                            <div class="card-text">
                                <a href="{{ $profile['html_url'] }}" target="_blank">Ir para o perfil</a>
                            </div>
                        </div>     
                    </div>                
                </div>
            </div>
            @endif                 
        </div>

     
      
    </div>

</div>
