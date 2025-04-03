<div class="mt-5">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Funcionário</h3>

        <div class="card-body">
            <p class="d-flex justify-content-center mb-0"><ins><strong>Funcionário</strong></ins></p>
            <form wire:submit.prevent="salvar">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" placeholder="Insira o nome" wire:model.defer="nome">
                    @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" placeholder="Insira o CPF" wire:model.defer="cpf">
                    @error('cpf') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Insira o e-mail" wire:model.defer="email">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control @error('senha') is-invalid @enderror" id="senha" name="senha" placeholder="Insira a senha" wire:model.defer="senha">
                    @error('senha') <div class="invalid-feedback">{{ $message }}</div> @enderror
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