<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_home') }}">
                    <i class="far fa-building"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-title">
                Manage
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="far fa-building"></i>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('menus.index') }}">
                    <i class="far fa-building"></i>
                    Menus
                </a>
            </li>
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
