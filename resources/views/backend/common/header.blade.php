<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="#"></a>

    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item px-3">
            <a class="nav-link">
                <i class="far fa-user-circle admin-user-avatar" aria-hidden="true"></i>
                Hello, {{ Auth::user()->first_name }}
            </a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="">
                Profile
            </a>
        </li>

        <li class="nav-item px-3">
            @if(Auth::guard('user')->check())
                <a class="nav-link" href="{{ route('admin_logout') }}">Logout</a>
            @elseif(Auth::guard('merchant')->check())
                <a class="nav-link" href="{{ route('merchant_logout') }}">Logout</a>
            @endif
        </li>
    </ul>
</header>
