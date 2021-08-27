    <div class="form4 top">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="form-bg">
                        {{-- wire:submit.prevent usado para não recarregar a página --}}
                        <form wire:submit.prevent="submitForm" class="form">
                            <div class="form-group">
                                <label class="sr-only">Name</label>
                                <input wire:model="name" type="text" 
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Seu nome!!!!!!"
                                    >
                                @error('name')<span class="error">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input wire:model="email" 
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    placeholder="O Email!!"
                                    >
                                @error('email')<span class="error">{{ $message }}</span>@enderror
                            </div>   
                            <div class="form-group">
                                <label class="sr-only">Message</label>
                                <textarea
                                    wire:model="message"
                                    name="message"
                                    class="form-control"
                                    rows="7"
                                    placeholder="A mensagem !!!"
                                    >
                                </textarea>
                                @error('message')<span class="error">{{ $message }}</span>@enderror
                            </div>
                            <button
                                wire:loading.attr="disabled"
                                wire:target="submitForm"
                                type="submit"
                                class="btn text-center btn-blue"
                                >
                                <span
                                    wire:loading
                                    wire:target="submitForm"
                                    class="spinner-border spinner-border-sm"
                                    role="status"
                                    aria-hidden="true"
                                >
                                </span>
                                Enviar Mensagem
                            </button>
                                @if ($successMessage)
                                    <div class="alert alert-success alert-dismissible">
                                        <button
                                            wire:click="$set('successMessage', null)"
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"                                    
                                            >&times;
                                        </button>
                                        <strong>Legal!</strong> $successMessage
                                    </div>                                
                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
