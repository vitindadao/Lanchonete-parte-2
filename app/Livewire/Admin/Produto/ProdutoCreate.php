<?php

namespace App\Livewire\Admin\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'ingredientes' => 'required|string|min:5',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|image|max:2048', // Limite de 2MB para imagem
    ];

    protected $messages = [
        'nome.required' => 'Nome é obrigatório.',
        'nome.min' => 'Nome deve ter pelo menos 3 caracteres.',
        'ingredientes.required' => 'Os ingredientes são obrigatórios.',
        'ingredientes.min' => 'Os ingredientes devem ter pelo menos 5 caracteres.',
        'valor.required' => 'O valor é obrigatório.',
        'valor.numeric' => 'O valor deve ser numérico.',
        'imagem.image' => 'O arquivo deve ser uma imagem.',
        'imagem.max' => 'O tamanho máximo da imagem é 2MB.',
    ];

    public function store()
    {
        $this->validate();

        // Salva a imagem se for enviada
        $imagemPath = $this->imagem ? $this->imagem->store('produtos', 'public') : null;

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath, 
        ]);

        session()->flash('message', 'Produto cadastrado com sucesso!');
        $this->limparCampos(); // Limpa os inputs após o cadastro
    }

    public function limparCampos()
    {
        $this->nome = '';
        $this->ingredientes = '';
        $this->valor = '';
        $this->imagem = '';
    }


    public function render()
    {
        return view('livewire.admin.produto.produto-create');
    }
}
