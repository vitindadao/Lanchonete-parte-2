<?php

namespace App\Livewire\Admin\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoEdit extends Component
{

    public $produtoId;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;
    public $imagemAtual;

    public function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'ingredientes' => 'required|string|min:5',
            'valor' => 'required|numeric|min:0',
            'imagem' => 'nullable|image|max:2048', // 2MB
        ];
    }

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

    public function mount($id)
    {
        $produto = Produto::find($id);
        if ($produto) {
            $this->produtoId = $produto->id;
            $this->nome = $produto->nome;
            $this->ingredientes = $produto->ingredientes;
            $this->valor = $produto->valor;
            $this->imagemAtual = $produto->imagem;
        }
    }

    public function salvar()
    {
        $this->validate();

        $produto = Produto::find($this->produtoId);
        
        if (!$produto) {
            session()->flash('error', 'Produto não encontrado.');
            return;
        }

        // Se houver uma nova imagem, faz o upload
        if ($this->imagem) {
            $imagemPath = $this->imagem->store('produtos', 'public');
        } else {
            $imagemPath = $this->imagemAtual; // Mantém a imagem atual
        }

        $produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('message', 'Produto atualizado com sucesso!');
    }


    public function render()
    {
        return view('livewire.admin.produto.produto-edit');
    }
}
