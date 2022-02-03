<header class="main-header">
    <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                        <span class="logo-mini"></span>
                <!-- logo for regular state and mobile devices -->

                        <span class="logo-lg"><b></b></span>
                </a>

                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->role_id == 1)
                                    <img src="{{asset('assets/img/users/admin/'.Auth::user()->photo)}}" class="user-image" alt="User Image">
                                @endif()
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                    @if(Auth::user()->role_id == 1)
                                        <img src="{{asset('assets/img/users/admin/'.Auth::user()->photo)}}" class="img-circle"
                                            alt="User Image">
                                    @endif()

                                        <p>
                                            Admin
                                            <small>{{ Auth::user()->email }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer text-center">
                                        <div class="">
                                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                        </ul>
                    </div>
                </nav>

</header>
