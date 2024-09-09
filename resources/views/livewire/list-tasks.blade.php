<div class="list-tasks-container">
    <livewire:modal />
    <div class="filters">
        <label><input type="checkbox" class="priority-filter" value="ALTA" checked> Alta</label>
        <label><input type="checkbox" class="priority-filter" value="MEDIA" checked> Média</label>
        <label><input type="checkbox" class="priority-filter" value="BAIXA" checked> Baixa</label>
        <label>Categoria
            <select id="category-filter">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->nome}}">{{$categoria->nome}}</option>
                @endforeach
                
            </select>
        </label>
    </div>
    <table class="table table-striped table-bordered" id="list-tasks-table">
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
                <tr>
                    <th class="{{$priorityClass}}" style="text-align: center">{{$tarefa->prioridade}}<i class="fa-solid fa-bolt"></i></td>
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
                        <button wire:click="editTarefa({{ $tarefa->id }})" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
                        <button  wire:click="excluirTarefa({{ $tarefa->id }})" class="btn btn-danger"><i class="fa-solid fa-trash"></i>Excluir</button>
                        <button wire:click="concluirTarefa({{ $tarefa->id }})" class="btn btn-success"><i class="fa-solid fa-check"></i>Concluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
