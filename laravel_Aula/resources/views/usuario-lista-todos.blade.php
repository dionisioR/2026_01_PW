@extends('template.main_template')

@section('content')
<!-- ------------------------------------------------ -->
<main class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>
            <i class="bi bi-people"></i>
            Usuários
        </h3>

        <a href="#" class="btn btn-success">
            <i class="bi bi-person-plus"></i>
        </a>

    </div>

    <div class="row">

        @if($usuarios->count() == 0)
            <div class="col-12">    
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle"></i>
                    Nenhum usuário cadastrado.
                </div>
            </div>
        @else
     
            @foreach ($usuarios as $usuario)
            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <div class="card-body">

                        <h5 class="card-title mb-2">
                            <i class="bi bi-person-circle"></i>
                            {{ $usuario->usu_nome }}
                        </h5>

                        <p class="text-muted mb-0">
                            <i class="bi bi-envelope"></i>
                            {{ $usuario->usu_email }}
                            {{-- Crypt::decrypt($usuario->usu_senha) --}}
                        </p>

                    </div>

                    <div class="card-footer d-flex justify-content-end gap-2">

                        <!-- EDITAR -->
                        <a href="#"
                            class="btn btn-primary btn-sm"
                            title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- DELETAR -->
                        <form method="POST"
                            action="#"
                            onsubmit="return confirm('Deseja excluir este usuário?')">




                            <button class="btn btn-danger btn-sm" title="Excluir">
                                <i class="bi bi-trash"></i>
                            </button>

                        </form>

                    </div>

                </div>

            </div>
            @endforeach

        @endif


    </div>

</main>
<!-- ------------------------------------------------ -->
@endsection