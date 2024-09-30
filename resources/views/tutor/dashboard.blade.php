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
                            <h2>{{ $totalEnrolledCourses }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card dash-info flex-fill">
                        <div class="card-body">
                            <h5>Total Courses</h5>
                            <h2>{{ $totalCourses }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card dash-info flex-fill">
                        <div class="card-body">
                            <h5>Active Courses</h5>
                            <h2>{{ $activeCourses }}</h2>
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
                                            <a href="{{ route('tutor.course.show', $course->slug) }}"
                                                class="course-table-img">
                                                <span><img src="{{ $course->image }}" alt="Img"></span>
                                                {{ $course->title }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $course->enrollments_count }}</td>
                                    <td class="text-title">{{ $course->status }}</td>
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
                        <x-course-card :course="$enrollment->course" />
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
