<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Index extends Component
{
    public $search = ''; // Variável para armazenar o termo de busca (somente CPF)
    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    public function render()
    {
        $cliente = Cliente::when(strlen($this->search) > 0, function ($query) {
            return $query->where('cpf', 'like', '%' . $this->search . '%');
        }, function ($query) {
            return $query; // Retorna todos os cadastros quando não há pesquisa
        })->get();
    
        return view('livewire.cliente.index', compact('cliente'));
    }

    public function abrirModalVisualizar($clienteId)
    {
        $cliente = Cliente::find($clienteId);

        if($cliente) {
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
            $this->cpf = $cliente->cpf;
            $this->email = $cliente->email;
            $this->senha = $cliente->senha;
        }
    }

    public function abrirModalExclusao($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function excluir()
    {
        if($this->clienteId) {
            Cliente::find($this->clienteId)->delete();
        }
    }

public function buscarCliente()
{
    $this->render(); // Apenas para garantir que Livewire atualize a página
}
}