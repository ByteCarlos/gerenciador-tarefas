<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Tarefa;
use Illuminate\View\View;

class Modal extends Component
{
    protected $listeners = [
        'createEvent' => 'create',
        'editTarefa' => 'edit'
    ];

    public $categorias = [];

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
     * Armazena o id da categoria da tarefa.
     * 
     * @var int
     */
    public $categoria_id;

    /**
     * Prioridade da tarefa ['ALTA', 'MEDIA', 'BAIXA'].
     * 
     * @var string
     */
    public $prioridade;

    /**
     * FK de usuário para tarefa.
     * 
     * @var int
     */
    public $user_id;

    /**
     * Regras de validação do formulário.
     * 
     * @var array
     */
    protected $rules = [
        'titulo' => 'required|string|max:100',
        'descricao' => 'required|string',
        'categoria_id' => 'required',
        'user_id' => 'required',
    ];

    /**
     * Mensagens de erro personalizadas para cada regra de validação.
     * 
     * @return array
     */
    protected function messages()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O título deve ser um texto válido.',
            'titulo.max' => 'O título não pode ter mais de 100 caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'A descrição deve ser um texto válido.',
            'categoria_id.required' => 'Você deve selecionar uma categoria.',
        ];
    }

    /**
     * Reseta os campos do formulário.
     * Limpa os valores das propriedades `$titulo`, `$descricao`, e `$tarefaId`.
     *
     * @return void
     */
    public function resetFields()
    {
        $this->tarefaId = null;
        $this->titulo = '';
        $this->descricao = '';
        $this->categoria_id = '';
        $this->prioridade = '';
    }

    /**
     * Abre o modal para a criação de uma nova tarefa.
     * Limpa os campos do formulário e exibe o modal.
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return void
     */
    #[On('create-event')]
    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    /**
     * Abre o modal para a edição de uma tarefa existente.
     * Preenche os campos do formulário com os dados da tarefa a ser editada.
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @param Tarefa $tarefa Tarefa a ser editada
     * @return void
     */
    public function edit(Tarefa $tarefa)
    {
        $this->tarefaId = $tarefa->id;
        $this->titulo = $tarefa->titulo;
        $this->descricao = $tarefa->descricao;
        $this->categoria_id = $tarefa->categoria_id;
        $this->prioridade = $tarefa->prioridade;
        $this->openModal();
    }

    /**
     * Salva uma nova tarefa ou atualiza uma tarefa existente.
     * Valida os dados do formulário e decide se deve criar ou atualizar uma tarefa,
     * com base na presença de `$tarefaId`.
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return RedirectResponse
     */
    public function save()
    {
        $this->user_id = Auth::user()->id;
        $this->validate();
        $this->closeModal();
        if ($this->tarefaId) {
            // Atualiza a tarefa existente
            $tarefa = Tarefa::find($this->tarefaId);
            $tarefa->update([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'categoria_id' => $this->categoria_id,
                'prioridade' => $this->prioridade ? $this->prioridade : 'MEDIA',
                'user_id' => $this->user_id,
            ]);
            $message = 'Tarefa atualizada com sucesso.';
           
        } else {
            // Cria uma nova tarefa
            Tarefa::create([
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
                'categoria_id' => $this->categoria_id,
                'prioridade' => $this->prioridade ? $this->prioridade : 'MEDIA',
                'user_id' => $this->user_id,
            ]);
            $message = 'Tarefa criada com sucesso.';
        }

        return redirect()->route('tarefas.index')->with('success', $message);
    }

    /**
     * Abre o modal definindo `$isOpen` como `true`.
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return void
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Fecha o modal definindo `$isOpen` como `false`.
     * @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return void
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * Renderiza o componente Livewire e retorna a view associada.
     *  @author ByteCarlos <carlos.hr.contato@gmail.com>
     * @return View
     */
    public function render()
    {
        return view('livewire.modal', ["categorias" => $this->categorias]);
    }
}

