@extends('template.main_template')

@section('content')
<!--  aqui entra o nosso código -->

<!-- ------------------------------------------------- -->
<main class="container mt-5 w-50">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                <i class="bi bi-box"></i>
                Cadastro de Produtos
            </h3>

            <form method="POST" action="{{ route('produtoFormSubmit') }}">
                @csrf
                <!-- NOME -->
                <div class="mb-3">
                    <label class="form-label">Nome do produto</label>
                    <input
                        type="text"
                        name="nome"
                        class="form-control"
                        placeholder="Digite o nome completo"
                        value="{{ old('nome') }}"
                        >
                </div>

                @error('nome')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- DESCRICAO -->
                <div class="mb-3">
                    <label class="form-label">Descrição do produto</label>
                    <input
                        type="text"
                        name="descricao"
                        class="form-control"
                        placeholder="Digite a descrição do produto"
                        value="{{ old('descricao') }}"
                        >
                </div>
                
                @error('descricao')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <!-- PREÇO -->
                <div class="mb-3">
                    <label class="form-label">Preço do produto</label>
                    <input
                        type="number"
                        name="preco"
                        class="form-control"
                        placeholder="0.00"
                        step="0.01"
                        value="{{ old('preco') }}"
                       >
                </div>
                @error('preco')
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
                        Cadastrar
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