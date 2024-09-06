<div class="list-tasks-container">
    <table class="table table-striped table-bordered" id="list-tasks-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Criada em</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <th scope="row">{{$tarefa->id}}</td>
                    <td>{{$tarefa->created_at}}</td>
                    <td>{{$tarefa->titulo}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>
                        @if ($tarefa->status == "PENDENTE")
                            PENDENTE<i class="fa-solid fa-clock" style="color:orange"></i>
                        @else
                            CONCLUÍDA<i class="fa-solid fa-square-check" style="color:green"></i>
                        @endif
                    </td>
                    <td class="actions-buttons">
                        <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Editar</button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
