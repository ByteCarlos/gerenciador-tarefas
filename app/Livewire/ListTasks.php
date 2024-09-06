<?php

namespace App\Livewire;

use Livewire\Component;

class ListTasks extends Component
{
    public $tarefas = [];

    public function render()
    {
        return view('livewire.list-tasks', ["tarefas" => $this->tarefas]);
    }
}
