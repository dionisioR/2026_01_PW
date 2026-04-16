@extends('template.main_template')

@section('content')
<!--  aqui entra o nosso código -->

<!-- ------------------------------------------------- -->
<main class="container mt-5 w-50">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                <i class="bi bi-person-plus"></i>
                Cadastro de Usuário
            </h3>

            <form method="POST" action="{{ route('usuario-edit-submit') }}">
                @csrf
            
                <input type="hidden" name="id" value="{{ Crypt::encrypt($usuario->usu_id) }}">
                <!-- NOME -->
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="Digite o nome completo"
                        value="{{ old('nome', $usuario->usu_nome) }}"
                        >
                </div>

                @error('nome')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Digite o email"
                        value="{{ old('email', $usuario->usu_email) }}"
                        >
                </div>
                
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- SENHA -->
                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input
                        type="password"
                        name="senha"
                        class="form-control"
                        placeholder="Digite a senha"
                    
                       >
                </div>
                @error('senha')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- BOTÕES -->
                <div class="d-flex justify-content-between">

                    <a href="#" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Voltar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i>
                        Atualizar
                    </button>

                </div>

            </form>

        </div>

        @if(session("success"))
            <div class="alert alert-success m-3">
                {{ session("success") }}
            </div>
        @endif
        
    </div>

</main>
<!-- -------------------------------------------- -->

@endsection