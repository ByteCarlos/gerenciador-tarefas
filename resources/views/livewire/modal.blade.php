<div>
    <!-- Modal -->
    @if($isOpen)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">
                            @if($tarefaId)
                                Editar Tarefa
                            @else
                                Criar Tarefa
                            @endif
                        </h5>
                        <div wire:click="closeModal" class="modal-close-button"><i class="fa-solid fa-xmark"></i></div>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário -->
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" id="titulo" wire:model="titulo" class="form-control" />
                                @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group">
                                <label for="descricao">Descrição</label>
                                <textarea id="descricao" wire:model="descricao" class="form-control"></textarea>
                                @error('descricao') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click="save">
                            @if($tarefaId)
                                Salvar
                            @else
                                Criar
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
