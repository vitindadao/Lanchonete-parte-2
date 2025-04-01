<div class="mt-5">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Produto</h3>

        <div class="card-body">
            <p class="d-flex justify-content-center mb-0"><ins><strong>Produto</strong></ins></p>
            <form wire:submit.prevent="salvar">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="Insira o nome do produto" wire:model.defer="nome">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="ingredientes" class="form-label">Ingredientes</label>
                    <input type="text" class="form-control @error('ingredientes') is-invalid @enderror" id="ingredientes" name="ingredientes" placeholder="Insira os ingredientes" wire:model.defer="ingredientes">
                    @error('ingredientes') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" placeholder="Insira o valor do produto" wire:model.defer="valor">
                    @error('valor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" wire:model="imagem">
                    @error('imagem') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    @if($imagem)
                        <img src="{{ $imagem->temporaryUrl() }}" class="img-fluid mt-2" width="200" />
                    @elseif($imagem)
                        <img src="{{ asset('storage/' . $imagem) }}" class="img-fluid mt-2" width="200" />
                    @endif
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success w-75 p-3">Confirmar Edição</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('fecharModalEdicao', function() {
                var modal = document.getElementById('editModal');
                var modalInstance = bootstrap.Modal.getInstance(modal);
    
                if (modalInstance) {
                    modalInstance.hide();
                } else {
                    var newModal = new bootstrap.modal(modal);
                    newModal.hide();
                }
    
                document.querySelectorAll('.modal-backdrop')
                    .forEach(el => el.remove());
                document.body.classList.remove('modal-open');
            })
        });
    </script>
</div>
