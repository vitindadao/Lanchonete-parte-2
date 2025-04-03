<?php

namespace App\Livewire\Admin\Funcionario;

use Livewire\Component;

class FuncionarioCreate extends Component
{

    public $nome;
    public $cpf; // Propriedade pública para CPF
    public $email; // Propriedade pública para email
    public $senha; // Propriedade pública para senha

    // Regras de validação para os campos de funcionário
    protected $rules = [
        'nome' => 'required|string|min:3|max:100', // Nome deve ser obrigatório, entre 3 e 100 caracteres
        'cpf' => 'required|string|size:11|unique:funcionarios,cpf', // CPF único e com 11 caracteres
        'email' => 'required|email|unique:funcionarios,email', // E-mail único e válido
        'senha' => 'required|string|min:6', // Senha obrigatória com no mínimo 6 caracteres
    ];

    // Mensagens personalizadas de erro
    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.min' => 'Nome deve ter pelo menos 3 caracteres.',
        'cpf.required' => 'CPF é obrigatório.',
        'cpf.size' => 'O CPF deve ter exatamente 11 caracteres.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'email.required' => 'E-mail é obrigatório.',
        'email.email' => 'O e-mail deve ser válido.',
        'email.unique' => 'Este e-mail já está cadastrado.',
        'senha.required' => 'Senha é obrigatória.',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres.',
    ];

    // Função para armazenar os dados do funcionário
    public function store()
    {
        $this->validate(); // Validação dos dados

        // Criação do novo funcionário
        \App\Models\Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha), // Criptografa a senha
        ]);

        session()->flash('message', 'Funcionário cadastrado com sucesso!');
        $this->limparCampos(); // Limpa os campos após o cadastro
    }

    // Função para limpar os campos do formulário
    public function limparCampos()
    {
        $this->nome = '';
        $this->cpf = '';
        $this->email = '';
        $this->senha = '';
    }

    // Função para renderizar o view do formulário de criação de funcionário

    public function render()
    {
        return view('livewire.admin.funcionario.funcionario-create');
    }
}
