<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class ListTasks extends Component
{
    public $tarefas = [];

    public function render() : View
    {
        return view('livewire.list-tasks', ["tarefas" => $this->tarefas]);
    }
}
