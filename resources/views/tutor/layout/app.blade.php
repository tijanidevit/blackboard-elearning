<!DOCTYPE html>
<html lang="zxx">

@include('tutor.layout.head')


<body>

    @include('tutor.layout.header')


    <div class="main-wrapper">
        <div class="breadcrumb-bar breadcrumb-bar-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="breadcrumb-list">
                            <h2 class="breadcrumb-title">@yield('title')</h2>
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('tutor.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 theiaStickySidebar">
                        <div class="settings-widget dash-profile">
                            <div class="settings-menu">
                                @if (auth()->user()->tutor)
                                <div class="profile-bg">
                                    <div class="profile-img">
                                        <a href="{{route('tutor.profile')}}"><img src="{{auth()->user()->tutor?->image}}" alt="Img"></a>
                                    </div>
                                </div>
                                @endif

                                <div class="profile-group">
                                    <div class="profile-name text-center">
                                        <h4><a href="{{route('tutor.profile')}}">{{auth()->user()->name}}</a></h4>
                                        <p style="text-transform: capitalize">{{auth()->user()->role}}</p>
                                        <a href="{{route('tutor.course.create')}}" class="add-course btn-primary">Add New Course</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="settings-widget account-settings">
                            <div class="settings-menu">
                                <ul>
                                    <li class="nav-item active">
                                        <a href="{{route('tutor.dashboard')}}" class="nav-link">
                                            <i class="bx bxs-tachometer"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.course.index')}}" class="nav-link ">
                                            <i class="bx bxs-rocket"></i>My Courses
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.course.index')}}" class="nav-link">
                                            <i class="bx bxs-volume-full"></i>Announcements
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="instructor-assignment.html" class="nav-link ">
                                            <i class="bx bxs-file"></i>Assignments
                                        </a>
                                    </li> --}}

                                    <li class="nav-item">
                                        <a href="{{route('tutor.profile')}}" class="nav-link">
                                            <i class="bx bxs-user"></i>Profile
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <form class="nav-link" action="{{route('logout')}}" method="post">
                                            <button class="nav-link">
                                                <i class="bx bxs-log-out"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @yield('body')
                </div>
            </div>
        </div>
    </div>

    @include('tutor.layout.footer')
    @include('tutor.layout.scripts')
</body>

</html>
