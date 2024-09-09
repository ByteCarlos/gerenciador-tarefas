<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" wire:model="password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="users-example d-flex mt-4">
        <div>
            <h4>Usuário Teste 1</h4>
            <p>E-mail: teste1@example.com</p>
            <p>Senha: password123</p>
        </div>
        
        <div class="">
            <h4>Usuário Teste 2</h4>
        <p>E-mail: teste2@example.com</p>
        <p>Senha: password123</p>
        </div>

        <div class="">
            <h4>Usuário Teste 3</h4>
        <p>E-mail: teste3@example.com</p>
        <p>Senha: password123</p>
        </div>
    </div>
</div>
