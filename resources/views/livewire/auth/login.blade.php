<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-50">
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card mx-auto shadow-lg p-3 mb-5 bg-white rounded">
            <h3 class="card-header text-center">Login</h3>

            <div class="card-body">
                <form wire:submit.prevent="login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" wire:model="email" class="form-control"
                            placeholder="Digite seu email">
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" wire:model="password" class="form-control"
                            placeholder="Digite sua senha">
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-center mt-3 mb-3">
                        <a href="#" class="text-primary"><strong>Esqueceu a senha?</strong></a>
                    </div>

                    <button type="submit" class="btn btn-dark w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
