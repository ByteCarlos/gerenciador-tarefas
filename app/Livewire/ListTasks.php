<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\View\View;
use Livewire\Component;

class ListTasks extends Component
{
    public $tarefas = [];

    public $tarefa;

    public function editTarefa($tarefaId)
    {
        // Carregue o modelo Tarefa com o ID fornecido
        $this->tarefa = Tarefa::find($tarefaId);

        // Faça algo com o modelo, como abrir um modal para edição
        $this->dispatch('editTarefa', $this->tarefa);
    }

    public function render() : View
    {
        return view('livewire.list-tasks', ["tarefas" => $this->tarefas]);
    }


}
