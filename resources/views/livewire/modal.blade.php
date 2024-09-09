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
                                <label class="mb-2" for="titulo">Título</label>
                                <input type="text" id="titulo" wire:model="titulo" class="form-control" />
                                @error('titulo') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label class="mb-2" for="descricao">Descrição</label>
                                <textarea id="descricao" wire:model="descricao" class="form-control"></textarea>
                                @error('descricao') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label class="mb-2" for="categoria_id">Categoria</label>
                                <select class="form-select" wire:model="categoria_id" id="categoria_id">
                                    <option value="" disabled selected>Selecione uma categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label class="mb-2" for="prioridade">Prioridade</label>
                                <select class="form-select" wire:model="prioridade" id="prioridade">
                                    <option value="" disabled selected>Selecione a prioridade</option>
                                    <option value="ALTA">ALTA</option>
                                    <option value="MEDIA">MÉDIA</option>
                                    <option value="BAIXA">BAIXA</option>
                                </select>
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
