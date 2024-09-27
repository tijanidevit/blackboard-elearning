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
                            <a href="{{route('tutor.course.index')}}">My courses
                        </li>
                        <li class="">
                            <a href="{{route('tutor.profile')}}">Profile
                        </li>
                        {{-- <li class="">
                            <a href="#">Notifications
                        </li> --}}
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
                    @if (auth()->user()->tutor)
                    <li class="nav-item user-nav">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="{{auth()->user()->tutor->image}}" alt="Img">
                                <span class="status online"></span>
                            </span>
                        </a>
                        <div class="users dropdown-menu dropdown-menu-right"
                            data-popper-placement="bottom-end">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="{{auth()->user()->tutor->image}}" alt="User Image"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>{{auth()->user()->name}}</h6>
                                    <p class="text-muted mb-0 text-title">{{auth()->user()->role}}</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{route('tutor.profile')}}">
                                <i class="fa fa-user me-1"></i>
                                Edit Profile
                            </a>
                            <form class="dropdown-item" method="POST" action="{{route('logout')}}">
                                @csrf
                                <i class="fa fa-arrow-left me-1"></i>
                                <button class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
