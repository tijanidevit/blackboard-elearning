
<header class="header">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
            <div class="container">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{url('/')}}" class="navbar-brand logo">
                        <img src="/assets/img/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="{{url('/')}}" class="menu-logo">
                            <img src="/assets/img/logo.svg" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
                        <li class="">
                            <a href="{{route('course.index')}}">All courses
                        </li>

                        @auth
                            <li class="">
                                <a href="{{route('student.dashboard')}}">Dashboard
                            </li>

                            <li class="">
                                <a href="{{route('student.course.enrolled')}}">Enrolled courses
                            </li>

                            <li class="">
                                <a href="{{route('student.course.completed')}}">Completed courses
                            </li>
                        @endauth

                        @guest
                        <li class="login-link">
                            <a href="{{route('login')}}">Login</a>
                        </li>
                        <li class="login-link">
                            <a href="{{route('register')}}">register</a>
                        </li>
                        @endguest
                        @auth
                        <li class="login-link">
                            <form action="{{route('logout')}}">
                                @csrf
                                <button class="btn">Logout</button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <div>
                            <a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle  ">
                                <i class="fa-solid fa-moon"></i>
                            </a>
                            <a href="javascript:void(0);" id="light-mode-toggle" class="dark-mode-toggle ">
                                <i class="fa-solid fa-sun"></i>
                            </a>
                        </div>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link header-sign" href="{{route('login')}}">Signin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{route('register')}}">Signup</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="nav-link header-sign text-danger">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
