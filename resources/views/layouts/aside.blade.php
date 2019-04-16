<aside class="main-sidebar dark-bg">
    <section class="sidebar">
        <div class="user-panel black-bg">
            <div class="pull-left image">
                <img src="{!! asset('painel/img/profile_icon.png') !!}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header dark-bg">Menu</li>

            <li>
                <a href="{!! route('adm.index') !!}">
                    <i class="fa fa-th"></i> <span>Painel</span>
                </a>
            </li>
        </ul>
        <!-- sidebar-menu -->
    </section>
</aside>
