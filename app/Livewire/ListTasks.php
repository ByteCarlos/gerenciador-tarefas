<?php

namespace App\Livewire;

use App\Models\Tarefa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Features\SupportEvents\Event;
use Livewire\Component;

class ListTasks extends Component
{
    public $tarefas = [];

    /**
     * Emite o evento para abrir o modal para atualizar a tarefa
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @param $tarefaId ID da tarefa a ser atualizada
     * @return void
     */
    public function editTarefa(int $tarefaId)
    {
        $tarefa = Tarefa::find($tarefaId);

        $this->dispatch('editTarefa', $tarefa);
    }

    /**
     * Conclui uma tarefa e atualiza a listagem
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @param $tarefaId ID da tarefa a ser concluída
     * @return RedirectResponse
     */
    public function concluirTarefa(int $tarefaId)
    {
        $tarefa = Tarefa::find($tarefaId);
        $tarefa->status = "CONCLUIDA";

        if($tarefa->save()) {
            return redirect()->route('tarefas.index')->with('success', 'Tarefa concluída com sucesso.');
        }else {
            return redirect()->route('tarefas.index')->with('error', 'Ocorreu um erro ao concluir a tarefa.');
        }
    }

    /**
     * Exclui uma tarefa
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @param $tarefaId ID da tarefa a ser excluída
     * @return RedirectResponse
     */
    public function excluirTarefa(int $tarefaId)
    {
        $tarefa = Tarefa::find($tarefaId);

        if($tarefa->delete()) {
            return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
        }else {
            return redirect()->route('tarefas.index')->with('error', 'Ocorreu um erro ao excluir a tarefa.');
        }
    }

    /**
     * Renderiza o componente de listagem da tarefas
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return View
     */
    public function render()
    {
        return view('livewire.list-tasks', ["tarefas" => $this->tarefas]);
    }


}
