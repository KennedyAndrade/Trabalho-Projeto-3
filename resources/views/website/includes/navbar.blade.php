<nav class="navbar navbar-expand-md  navbar-secondary fixed-top">
    <a class="navbar-brand" href="index.html">
        <img src="{!! asset('website/img/logo.png') !!}" class="img-fluid" alt="logo">
    </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#sobre">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#produtos">E-books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#contato">Contato</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Artigos
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item disabled" href="#">Nutrição</a>
                    <a class="dropdown-item text-success" href="#card_1">Dicas Fit</a>
                    <a class="dropdown-item text-success" href="#">Curiosidades Fit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="#">Saúde Mental</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-success" href="#">Dicas Especializadas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" href="#">Saúde Física</a>
                    <a class="dropdown-item text-success" href="#">Esportes</a>
                </div>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Entrar</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">Registrar</a>
                    </li>
                @endif
            @else

                <li class="nav-item dropdown">
                    <a class="nav-link  text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->hasRole('adm'))
                            <a class="dropdown-item" href="{{ route('adm.index') }}">Painel</a>
                        @else
                            <a class="dropdown-item" href="{{ route('minhas_compras') }}">Minhas Compras</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
</nav>
