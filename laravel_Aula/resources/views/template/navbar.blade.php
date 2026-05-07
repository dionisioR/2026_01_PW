    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">

            <a class="navbar-brand" href="#">
                <i class="bi bi-box"></i> Sistema
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto">

                    @if(!session()->has('id'))
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuario-form') }}">
                            <i class="bi bi-people"></i> Cadastrar Usuários
                        </a>
                    </li>
                    @endif

                    @if(session()->has('id'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuario-lista') }}">
                            <i class="bi bi-people"></i> Listar Usuários
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produtoForm') }}">
                            <i class="bi bi-box-seam"></i> Cadastrar Produtos
                        </a>
                    </li>
                    
                    @endif
                </ul>

                <!-- LOGOUT -->

                <div class="d-flex">

                @if(session()->has('id'))
                    <!-- NOME DO USUÁRIO LOGADO -->
                    <span class="navbar-text me-3">
                        <i class="bi bi-person-circle"></i>
                        {{ session('nome') }}
                    </span>


                    <a href="{{ route('logout') }}" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>

                @else
                    <a href="{{ route('loginForm') }}" class="btn btn-secondary">
                        <i class="bi bi-person-check"></i>
                        Login
                    </a>
                @endif
                </div>

            </div>
        </div>
    </nav>