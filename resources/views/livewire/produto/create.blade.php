<div class="mt-5">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Cadastro de Produto</h3>
        <div class="card-body">
            <form wire:submit.prevent="store">

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="Insira o nome do produto" wire:model.defer="nome">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredientes" class="form-label">Ingredientes</label>
                    <textarea class="form-control @error('ingredientes') is-invalid @enderror" id="ingredientes" name="ingredientes" placeholder="Descreva os ingredientes" wire:model.defer="ingredientes"></textarea>
                    @error('ingredientes') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor (R$)</label>
                    <input type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" placeholder="Insira o valor do produto" wire:model.defer="valor">
                    @error('valor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem do Produto</label>
                    <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" wire:model="imagem">
                    @error('imagem') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                @if($imagem)
                    <div class="mb-3 text-center">
                        <img src="{{ $imagem->temporaryUrl() }}" alt="Preview da imagem" class="img-thumbnail" width="200">
                    </div>
                @endif

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark w-75 p-3">Cadastrar Produto</button>
                </div>
            </form>
        </div>
    </div>
</div>

