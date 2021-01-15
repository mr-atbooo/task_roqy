<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link" style="padding-left: 25px;" >
       <i class="nav-icon fas fa-tachometer-alt" style="padding-right: 5px;"></i>
        {{__('home.dashboard')}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="{{url('resources/assets/cpanel/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!---------------------- start magazine -------------------------->
                @if(auth()->user()->can('albums') ||
                    auth()->user()->can('show albums')  ||
                    auth()->user()->can('delete albums')
                    )
                <li class="nav-item">
                    <a href="{{route('albums')}}" class="nav-link {{ Request::is('admin/albums')||Request::is('admin/albums/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>  Albums</p>
                    </a>
                </li>
                @endif
                <!---------------------- end magazine -------------------------->

                <!---------------------- start Users & Roles -------------------------->
                 @if(auth()->user()->can('Users')       ||
                     auth()->user()->can('add User')    ||
                     auth()->user()->can('edit User')   ||
                     auth()->user()->can('delete User') ||
                     auth()->user()->can('Roles')       ||
                     auth()->user()->can('add Role')    ||
                     auth()->user()->can('edit Role')   ||
                     auth()->user()->can('delete Role')

                                                              )
                <li class="nav-item has-treeview
                 {{ Request::is('dashboard/users')||
                    Request::is('dashboard/users/*')||
                    Request::is('dashboard/roles')||
                    Request::is('dashboard/roles/*')
                     ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link
                    {{ Request::is('dashboard/users')||
                    Request::is('dashboard/users/*')||
                    Request::is('dashboard/roles')||
                    Request::is('dashboard/roles/*')
                     ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('home.users')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <!------------------ Start Users -------------------------->
                        @if(auth()->user()->can('Users') ||
                            auth()->user()->can('add User')  ||
                            auth()->user()->can('edit User') ||
                            auth()->user()->can('delete User')
                                                          )
                            <li class="nav-item">
                                <a href="{{route('users')}}" class="nav-link {{ Request::is('dashboard/users')||Request::is('dashboard/users/*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('home.users')}}</p>
                                </a>
                            </li>
                        @endif
                        <!------------------ end Users -------------------------->

                        <!------------------ Start Roles -------------------------->
                        @if(auth()->user()->can('Roles') ||
                            auth()->user()->can('add Role')  ||
                            auth()->user()->can('edit Role') ||
                            auth()->user()->can('delete Role')
                                                          )

                            <li class="nav-item">
                                <a href="{{route('roles')}}" class="nav-link {{ Request::is('dashboard/roles')||Request::is('dashboard/roles/*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('home.roles')}}</p>
                                </a>
                            </li>
                        @endif
                       <!------------------ End Roles -------------------------->
                    </ul>
                </li>
                @endif
                <!---------------------- end Users & Roles -------------------------->


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
