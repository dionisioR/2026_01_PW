<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel</title>

    <!-- Bootswatch Darkly -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{asset('assets/css/icons/bootstrap-icons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box"></i> Sistema
            </a>
        </div>
    </nav>
    <!-- ------------------------------------------- -->
    <div class="login">


        <div class="card w-50">
            <h3 class="text-center my-5">
                <i class="bi bi-box"></i>
                Sistemas
            </h3>
            <div class="card-body">

                <form action="{{ route('loginFormSubmit') }}" method="POST">
                    @csrf
                    <!-- e-mail -->
                    <div class="mb-3 px-5">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu e-mail" name="email">

                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- senha -->
                    <div class="mb-3 px-5">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha">

                        @error('senha')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- button -->
                    <div class="my-4 px-5">
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </div>
                </form>
            </div>

            <div class="mb-5 px-5 text-center">
                Não possui conta? <a href="{{ route('usuario-form') }}" class="">Cadastrar</a>
            </div>



            <div class="mb-5 px-5 text-center">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

        </div>


    </div>
    <!-- ------------------------------------------- -->

    <!-- FOOTER -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>