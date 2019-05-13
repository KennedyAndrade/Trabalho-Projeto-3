<header class="main-header dark-bg">

    <!-- Logo -->
    <a href="../index.html" class="logo dark-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!--<span class="logo-mini"><img src="{!! asset('painel/img/logo.png') !!}"></span>-->
        <!-- logo for regular state and mobile devices -->
        <!--<span class="logo-lg"><img src="{!! asset('painel/img/logo-lg.png') !!}"></span>-->
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><i class="fa fa-bars fa-lg"></i> <span class="sr-only">Toggle navigation</span></a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{!! route('website') !!}"><i class="fa fa-globe"></i> Site</a>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{!! asset('painel/img/profile_icon.png') !!}" class="user-image" alt="User Image"> <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <div class="pull-left user-img">
                                <img src="{!! asset('painel/img/profile_icon.png') !!}" class="img-responsive" alt="User">
                            </div>
                            <p class="text-left">{{ auth()->user()->name }}<small>{{ auth()->user()->email }}</small> </p>
                        </li>
                        @if (auth()->user()->hasRole('adm'))
                            <li>
                                <a href="{!! route('adm.index') !!}"> Painel</a>
                            </li>
                        @endif    
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
