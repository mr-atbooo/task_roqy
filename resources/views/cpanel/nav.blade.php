<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-th-large"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('myaccount')}}" target="_blank" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> my account
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{url('/')}}" target="_blank" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> Site
                </a>
                <div class="dropdown-divider"></div>
{{--                <a href="#" class="dropdown-item dropdown-footer">log out</a>--}}

                <a href="{{ route('logout') }}" class="dropdown-item dropdown-footer"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                >
                    {{__('home.logout')}}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <!--      <li class="nav-item">-->
        <!--        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">-->
        <!--          <i class="fas fa-th-large"></i>-->
        <!--        </a>-->
        <!--      </li>-->
    </ul>
</nav>
<!-- /.navbar -->
