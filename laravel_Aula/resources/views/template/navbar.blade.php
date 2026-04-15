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

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuario-lista') }}">
                            <i class="bi bi-people"></i> Listar Usuários
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-box-seam"></i> Produtos
                        </a>
                    </li>

                </ul>

                <!-- LOGOUT -->

                <div class="d-flex">

                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>

                </div>

            </div>
        </div>
    </nav>