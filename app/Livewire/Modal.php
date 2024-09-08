<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Tarefa;

class Modal extends Component
{
    protected $listeners = [
        'createEvent' => 'create',
        'editTarefa' => 'edit'
    ];
    /**
     * Controla a visibilidade do modal.
     * 
     * @var bool
     */
    public $isOpen = false;

    /**
     * Armazena o ID da tarefa que está sendo editada.
     * 
     * @var int|null
     */
    public $tarefaId;

    /**
     * Armazena o título da tarefa.
     * 
     * @var string
     */
    public $titulo;

    /**
     * Armazena a descrição da tarefa.
     * 
     * @var string
     */
    public $descricao;

    /**
     * Regras de validação do formulário.
     * 
     * @var array
     */
    protected $rules = [
        'titulo' => 'required|string|max:100',
        'descricao' => 'required|string',
    ];

    /**
     * Reseta os campos do formulário.
     * Limpa os valores das propriedades `$titulo`, `$descricao`, e `$tarefaId`.
     *
     * @return void
     */
    public function resetFields(): void
    {
        $this->tarefaId = null;
        $this->titulo = '';
        $this->descricao = '';
    }

    /**
     * Abre o modal para a criação de uma nova tarefa.
     * Limpa os campos do formulário e exibe o modal.
     *
     * @return void
     */
    #[On('create-event')] 
    public function create(): void
    {
        $this->resetFields();
        $this->openModal();
    }

    /**
     * Abre o modal para a edição de uma tarefa existente.
     * Preenche os campos do formulário com os dados da tarefa a ser editada.
     *
     * @param Tarefa $tarefa
     * @return void
     */
    public function edit(Tarefa $tarefa): void
    {
        $this->tarefaId = $tarefa->id;
        $this->titulo = $tarefa->titulo;
        $this->descricao = $tarefa->descricao;
        $this->openModal();
    }

    /**
     * Salva uma nova tarefa ou atualiza uma tarefa existente.
     * Valida os dados do formulário e decide se deve criar ou atualizar uma tarefa,
     * com base na presença de `$tarefaId`.
     *
     * @return RedirectResponse
     */
    public function save()
    {
        $this->validate();
        $this->closeModal();
        if ($this->tarefaId) {
            // Atualiza a tarefa existente
            $tarefa = Tarefa::find($this->tarefaId);
            $tarefa->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
            ]);
            $message = 'Tarefa criada com sucesso.';
           
        } else {
            // Cria uma nova tarefa
            Tarefa::create([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'status' => "PENDENTE",
            ]);
            $message = 'Tarefa criada com sucesso.';
        }

        return redirect()->route('tarefas.index')->with('success', $message);
    }

    /**
     * Abre o modal definindo `$isOpen` como `true`.
     *
     * @return void
     */
    public function openModal(): void
    {
        $this->isOpen = true;
    }

    /**
     * Fecha o modal definindo `$isOpen` como `false`.
     *
     * @return void
     */
    public function closeModal(): void
    {
        $this->isOpen = false;
    }

    /**
     * Renderiza o componente Livewire e retorna a view associada.
     * 
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        return view('livewire.modal');
    }
}

