<div class="list-tasks-container">
    <livewire:modal :categorias="$categorias" />
    <div class="container mt-0 mb-4" style="margin-left: 0">
        <div class="row">
            <div class="col-md-2">
                <h5>Prioridade</h5>
                <div class="d-flex gap-2">
                    <div class="form-check">
                        <input class="form-check-input priority-filter" type="checkbox" value="ALTA" checked>
                        <label class="form-check-label" for="priority-filter">
                            Alta
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input priority-filter" type="checkbox" value="MEDIA" checked>
                        <label class="form-check-label" for="priority-filter">
                            Média
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input priority-filter" type="checkbox" value="BAIXA" checked>
                        <label class="form-check-label" for="priority-filter">
                            Baixa
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <h5>Categoria</h5>
                <select class="form-select" id="category-filter">
                    <option value="">Todas</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->nome}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <h5>Status</h5>
                <select class="form-select" id="status-filter">
                    <option value="">Todos</option>
                    <option value="PENDENTE">Pendente</option>
                    <option value="CONCLUIDA">Concluída</option>
                </select>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered" id="list-tasks-table" wire:ignore.self>
        <thead>
            <tr>
                <th scope="col">Prioridade</th>
                <th scope="col">Criada em</th>
                <th scope="col">Categoria</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col" class="th-actions">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
            @php
            $priorityClass = "";
            if($tarefa->prioridade == "ALTA") {
            $priorityClass = "high-priority";
            }else if ($tarefa->prioridade == "MEDIA") {
            $priorityClass = "medium-priority";
            }else if ($tarefa->prioridade == "BAIXA") {
            $priorityClass = "low-priority";
            }
            @endphp
            <tr data-priority="{{ $tarefa->prioridade }}" data-categoria="{{ $tarefa->categoria->nome }}" data-status="{{ $tarefa->status }}">
                <td class="{{$priorityClass}}" style="text-align: center">{{$tarefa->prioridade}}
                    <i class="fa-solid fa-bolt"></i></td>
                <td>{{$tarefa->created_at}}</td>
                <td>{{$tarefa->categoria->nome}}</td>
                <td>{{$tarefa->titulo}}</td>
                <td>{{$tarefa->descricao}}</td>
                <td style="text-align: center">
                    @if ($tarefa->status == "PENDENTE")
                    PENDENTE<i class="fa-solid fa-clock" style="color:orange"></i>
                    @else
                    CONCLUÍDA<i class="fa-solid fa-square-check" style="color:green"></i>
                    @endif
                </td>
                <td class="actions-buttons">
                    <button wire:click="editTarefa({{ $tarefa->id }})" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i></button>
                    <button wire:click="excluirTarefa({{ $tarefa->id }})" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i></button>
                    <button wire:click="concluirTarefa({{ $tarefa->id }})" class="btn btn-success">
                        <i class="fa-solid fa-check"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
