<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;

class Header extends Component
{
    /**
     * Renderiza o componente de cabeçalho
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return View
     */
    public function render() : View
    {
        return view('livewire.header');
    }

    /**
     * Emite o evento de criação de evento
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return void
     */
    public function createEvent()
    {
        $this->dispatch('create-event');
    }
}
