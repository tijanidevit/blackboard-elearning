@extends('tutor.layout.app')

@section('title')
    All Courses
@endsection

@section('body')
    <div class="col-xl-9 col-lg-9">
        <div class="settings-widget card-info">
            <div class="settings-menu p-0">
                <div class="profile-heading">
                    <h3>My Courses</h3>
                    <p>Manage your courses and its updates</p>
                </div>
                <div class="checkout-form pb-0">
                    <div class="wishlist-tab">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="active" data-bs-toggle="tab"
                                    data-bs-target="#enroll-courses">Total Courses ({{$totalCourses}})</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#active-courses">Published
                                    ({{$publishedCourses}})</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" data-bs-toggle="tab" data-bs-target="#complete-courses">Draft
                                    ({{$totalCourses - $publishedCourses}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-conten">
                        <div class="">
                            <div class="row">

                                @forelse ($courses as $course)
                                    <x-course-card :course="$course" />
                                @empty
                                    <p>No courses available at the moment.</p>
                                @endforelse

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="dash-pagination">
            <div class="row align-items-center">
                <div class="col-6">
                    <p>Page 1 of 2</p>
                </div>
                <div class="col-6">
                    <ul class="pagination">
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#"><i class="bx bx-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
