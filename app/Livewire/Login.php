<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    // Regras de validação para os campos de login
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        // Valida os campos antes de tentar o login
        $this->validate();

        // Tentativa de login com o e-mail e senha fornecidos
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Se a autenticação for bem-sucedida, redirecionar para a página inicial
            return redirect()->to('/tarefas');
        } else {
            // Se falhar, exibir mensagem de erro
            $this->addError('email', 'E-mail ou senha incorretos.');
        }
    }

    public function render()
    {
        // Retorna a view do componente de login
        return view('livewire.login');
    }
}
