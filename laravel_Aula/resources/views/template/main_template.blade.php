    @include('template.header')
    @include('template.navbar')
    
    <!-- CONTEÚDO -->
    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-body">

                @yield('content')

            </div>
        </div>

    </main>
    
    @include('template.footer')
