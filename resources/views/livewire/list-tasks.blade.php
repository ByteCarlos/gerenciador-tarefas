<div class="list-tasks-container table">
    <table>
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Criada em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{$tarefa->titulo}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>
                        @if ($tarefa->status == "PENDENTE")
                            PENDENTE<i class="fa-solid fa-clock"></i>
                        @else
                            CONCLUÍDA<i class="fa-solid fa-square-check"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</div>
