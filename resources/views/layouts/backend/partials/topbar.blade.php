<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left shadow-sm">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            AGN
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="zmdi zmdi-notifications-none noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5><small><span class="badge badge-danger">7</span>Notification</small></h5>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                        <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1min
                                ago</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                        <p class="notify-details">New user registered.<small class="text-muted">1min ago</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1min
                                ago</small></p>
                    </a>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                        View All
                    </a>

                </div>
            </li>


            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/frontend/images/favicon.png') }}">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Welcome ! {{ Auth::user()->name }}</small> </h5>
                    </div>

                    <!-- item-->
                    <a href="{{ route('admin.account.setting') }}" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Account</span>
                    </a>

                    <!-- item-->
                    {{-- <a href="#" class="dropdown-item notify-item">
                    <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                </a> --}}

                    <!-- item-->
                    {{-- <a href="" class="dropdown-item notify-item">
                    <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
                </a> --}}

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- Logout End-->
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            <li class="hidden-mobile app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>
    </nav>
</div>
