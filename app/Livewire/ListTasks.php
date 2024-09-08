<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;

class ListTasks extends Component
{
    public $tarefas = [];

    public function editTarefa($tarefaId) : void
    {
        $tarefa = Tarefa::find($tarefaId);

        $this->dispatch('editTarefa', $tarefa);
    }

    public function concluirTarefa($tarefaId)
    {
        $tarefa = Tarefa::find($tarefaId);
        $tarefa->status = "CONCLUIDA";

        if($tarefa->save()) {
            return redirect()->route('tarefas.index')->with('success', 'Tarefa concluída com sucesso.');
        }else {
            return redirect()->route('tarefas.index')->with('error', 'Ocorreu um erro ao concluir a tarefa.');
        }
    }

    public function render() : View
    {
        return view('livewire.list-tasks', ["tarefas" => $this->tarefas]);
    }


}
