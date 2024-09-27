@extends('tutor.layout.app')

@section('title')
    Dashboard
@endsection


<!DOCTYPE html>
<html lang="en">


<body>

    @section('body')
        <div class="col-xl-9 col-lg-9">

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card dash-info flex-fill">
                        <div class="card-body">
                            <h5>Enrolled Courses</h5>
                            <h2>{{$totalEnrolledCourses}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card dash-info flex-fill">
                        <div class="card-body">
                            <h5>Total Courses</h5>
                            <h2>{{$totalCourses}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card dash-info flex-fill">
                        <div class="card-body">
                            <h5>Active Courses</h5>
                            <h2>{{$activeCourses}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="instructor-course-table">
                <div class="dashboard-title">
                    <h4>Recently Created Courses</h4>
                </div>
                <div class="table-responsive custom-table">

                    <table class="table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Courses</th>
                                <th>Enrolled</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestCourses as $course)
                            <tr>
                                <td>
                                    <div class="table-course-detail">
                                        <a href="{{route('tutor.course.show', $course->slug)}}" class="course-table-img">
                                            <span><img src="{{$course->image}}" alt="Img"></span>
                                            {{$course->title}}
                                        </a>
                                    </div>
                                </td>
                                <td>{{$course->enrollments_count}}</td>
                                <td class="text-title">{{$course->status}}</td>
                            </tr>
                            @empty
                                <x-empty-table message="No courses added recently" colspan="3" />
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="dashboard-title">
                <h4>Recently Enrolled Courses</h4>
            </div>
            <div class="row">

                @forelse ($latestEnrollments as $enrollment)

                <div class="col-xxl-4 col-md-6 d-flex">
                    <div class="course-box flex-fill">
                        <div class="product">
                            <div class="product-img">
                                <a href="course-details.html">
                                    <img class="img-fluid" alt="Img"
                                        src="assets/img/course/course-03.jpg">
                                </a>
                                {{-- <div class="price combo">
                                    <h3>FREE</h3>
                                </div> --}}
                            </div>
                            <div class="product-content">
                                <div class="course-group d-flex">
                                    <div class="course-group-img d-flex">
                                        <a href="instructor-profile.html"><img
                                                src="assets/img/user/user5.jpg" alt="Img"
                                                class="img-fluid"></a>
                                        <div class="course-name">
                                            <h4><a href="instructor-profile.html">Jenny</a></h4>
                                            <p>Instructor</p>
                                        </div>
                                    </div>
                                    <div
                                        class="course-share d-flex align-items-center justify-content-center">
                                        <a href="#"><i class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                                <h3 class="title instructor-text"><a href="course-details.html">Sketch
                                        from
                                        A to Z (2024): Become an app designer</a></h3>
                                <div class="course-info d-flex align-items-center">
                                    <div class="rating-img d-flex align-items-center">
                                        <img src="assets/img/icon/icon-01.svg" alt="Img">
                                        <p>10+ Lesson</p>
                                    </div>
                                    <div class="course-view d-flex align-items-center">
                                        <img src="assets/img/icon/icon-02.svg" alt="Img">
                                        <p>40hr 10min</p>
                                    </div>
                                </div>
                                <div class="rating mb-0">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating"><span>3.0</span>
                                        (18)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <x-empty-table message="None of your courses was recently enrolled" />
                </div>
                @endforelse

            </div>
        </div>
    @endsection

</body>

</html>
