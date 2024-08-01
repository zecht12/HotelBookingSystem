<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin.akun')}}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>my account
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>logout
                </a>
                <form action="{{ route('admin.logout') }}" id="logout-form" method="post">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>