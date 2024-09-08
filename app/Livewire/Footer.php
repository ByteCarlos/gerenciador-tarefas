<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Footer extends Component
{
    /**
     * Renderiza o componente de rodapé
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return View
     */
    public function render() : View
    {
        return view('livewire.footer');
    }
}
