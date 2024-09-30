@extends('layout.app')

@section('title')
    Completed courses
@endsection


<!DOCTYPE html>
<html lang="en">


<body>

    @section('body')
        <div class="main-wrapper">
            <div class="container">
                <div class="" style="margin-top: 6em">

                    <div class="dashboard-title mt-5 mb-4">
                        <h4>Completed Courses</h4>
                    </div>
                    <div class="row">

                        @forelse ($enrollments as $enrollment)
                            <div class="col-xxl-4 col-md-6 d-flex">
                                <div class="course-box flex-fill">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="{{ route('student.course.show', $enrollment->course->slug) }}">
                                                <img class="img-fluid" alt="Img" src="{{ $enrollment->course->image }}">
                                            </a>
                                            <div class="price combo">
                                                <h3>{{ $enrollment->course->category }}</h3>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="course-group d-flex">
                                                <div class="course-group-img d-flex">
                                                    <a href="#"><img src="{{ $enrollment->course->tutor->image }}" alt="Img"
                                                            class="img-fluid"></a>
                                                    <div class="course-name">
                                                        <h4><a href="#">{{ $enrollment->course->tutor->user->name }}</a></h4>
                                                        <p>Instructor</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="title instructor-text">
                                                <a href="{{ route('student.course.show', $enrollment->course->slug) }}">
                                                    {{ mb_strimwidth($enrollment->course->title, 0, 25, '...') }}</a>
                                            </h3>
                                            <div class="course-info d-flex align-items-center">
                                                <div class="rating-img d-flex align-items-center">
                                                    <img src="/assets/img/icon/icon-01.svg" alt="Img">
                                                    <p>{{ $enrollment->course->modules->count() }} modules</p>
                                                </div>
                                                <div class="course-view d-flex align-items-center">
                                                    <img src="/assets/img/icon/people.svg" alt="Img">
                                                    <p>{{ $enrollment->course->enrollments_count }} enrollments</p>
                                                </div>
                                            </div>

                                            @if (tutorId() != $enrollment->course->tutor_id)
                                                <div class="course-edit-btn d-flex align-items-center justify-content-end">
                                                    <div class="all-btn all-category d-flex align-items-center">
                                                        <a class="btn btn-primary" href="{{ route('student.course.show', $enrollment->course->slug) }}">Go to course</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <x-empty-table message="You do not have any ongoing course" />
                            </div>
                        @endforelse

                    </div>


                    {{$enrollments->links()}}
                </div>

            </div>
        </div>
    @endsection

</body>

</html>
