<?php

namespace App\Livewire\Admin\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;

class FuncionarioEdit extends Component
{

    public $funcionarioId;
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    // Regras de validação para os campos do funcionário
    public function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'cpf' => 'required|unique:funcionarios,cpf,' . $this->funcionarioId, // Ignora o CPF do próprio funcionário ao editar
            'email' => 'required|email|unique:funcionarios,email,' . $this->funcionarioId, // Ignora o e-mail do próprio funcionário ao editar
            'senha' => 'required|min:6',
        ];
    }

    // Mensagens de erro personalizadas
    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.min' => 'Nome deve ter no mínimo 3 caracteres.',
        'nome.max' => 'Nome deve ter no máximo 100 caracteres.',
        'cpf.required' => 'CPF é obrigatório.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'email.required' => 'E-mail é obrigatório.',
        'email.email' => 'Formato de e-mail inválido.',
        'email.unique' => 'Este e-mail já está cadastrado.',
        'senha.required' => 'Senha é obrigatória.',
        'senha.min' => 'Senha deve conter no mínimo 6 caracteres.',
    ];

    protected $listeners = [
        'editarFuncionario',
        'closeEditModal' => 'fecharModal'
    ];

    // Função para fechar o modal
    public function fecharModal()
    {
        $this->dispatch('hideModal');
    }


    // Função para montar os dados do funcionário ao editar
    public function mount($id)
    {
        $funcionario = Funcionario::find($id);
        if ($funcionario) {
            $this->funcionarioId = $funcionario->id;
            $this->nome = $funcionario->nome;
            $this->cpf = $funcionario->cpf;
            $this->email = $funcionario->email;
            $this->senha = $funcionario->senha;
        }
    }

    // Função para salvar as alterações do funcionário
    public function salvar()
    {
        $this->validate(); // Valida os dados

        $funcionario = Funcionario::find($this->funcionarioId);

        $funcionario->nome = $this->nome;
        $funcionario->cpf = $this->cpf;
        $funcionario->email = $this->email;
        $funcionario->senha = bcrypt($this->senha); // Criptografa a senha antes de salvar

        $funcionario->save();

        session()->flash('message', 'Funcionário atualizado com sucesso!');
    }




    public function render()
    {
        return view('livewire.admin.funcionario.funcionario-edit');
    }
}
