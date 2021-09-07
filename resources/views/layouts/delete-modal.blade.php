            <!-------------------------------   HTML do modal para testar o Alpine ---------------------------->
            <!-- onclick="openModal(true)" -->
            <div x-data="{ openDelete:{{ $modalDelete }}}">            
                <!-- Modal -->
                <div wire:ignore.self 
                    x-show="openDelete" x-cloak
                    x-transition:enter="transition duration-300 transform"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition duration-300 transform"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"            
                    
                    class="modal--form-back" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Exclusão</h5>
                                <button type="button" wire:click.prevent="modalDeleteClose()" class="close" aria-label="Close">
                                    <span aria-hidden="true close-btn">X</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja excluir?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" wire:click.prevent="{{$metodoDelete}}"
                                class="btn btn-danger close-modal" data-dismiss="modal">Sim</button>
                                <button type="button" wire:click.prevent="modalDeleteClose()" class="btn btn-secondary close-btn" data-dismiss="modal">Não</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>