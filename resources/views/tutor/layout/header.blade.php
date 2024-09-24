<header class="header header-page">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
            <div class="container ">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{route('tutor.dashboard')}}" class="navbar-brand logo">
                        <img src="/assets/img/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="{{route('tutor.dashboard')}}" class="menu-logo">
                            <img src="/assets/img/logo.svg" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li class="">
                            <a href="{{route('tutor.dashboard')}}">Dashboard
                        </li>
                        <li class="">
                            <a href="{{route('tutor.dashboard')}}">My courses
                        </li>
                        <li class="">
                            <a href="{{route('tutor.dashboard')}}">Profile
                        </li>
                        <li class="">
                            <a href="{{route('tutor.dashboard')}}">Notifications
                        </li>
                        <li class="login-link">
                            <a href="login.html">Login / Signup</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item user-nav">
                        <div>
                            <a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle  ">
                                <i class="fa-solid fa-moon"></i>
                            </a>
                            <a href="javascript:void(0);" id="light-mode-toggle" class="dark-mode-toggle ">
                                <i class="fa-solid fa-sun"></i>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item user-nav">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="/assets/img/user/user-17.jpg" alt="Img">
                                <span class="status online"></span>
                            </span>
                        </a>
                        <div class="users dropdown-menu dropdown-menu-right"
                            data-popper-placement="bottom-end">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="/assets/img/user/user-17.jpg" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>Eugene Andre</h6>
                                    <p class="text-muted mb-0">Instructor</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="instructor-dashboard.html"><i
                                    class="feather-home me-1"></i> Dashboard</a>
                            <a class="dropdown-item" href="instructor-settings.html"><i
                                    class="feather-star me-1"></i> Edit Profile</a>
                            <a class="dropdown-item" href="{{route('tutor.dashboard')}}"><i class="feather-log-out me-1"></i>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
