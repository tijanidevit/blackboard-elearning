@props(['course'])

<div class="col-xxl-4 col-md-6 d-flex">
    <div class="course-box flex-fill">
        <div class="product">
            <div class="product-img">
                <a href="{{route('tutor.course.show', $course->slug)}}">
                    <img class="img-fluid" alt="Img" src="{{$course->image}}">
                </a>
                {{-- <div class="price combo">
                    <h3>FREE</h3>
                </div> --}}
            </div>
            <div class="product-content">
                <div class="course-group d-flex">
                    <div class="course-group-img d-flex">
                        <a href="#"><img src="{{$course->tutor->image}}" alt="Img"
                                class="img-fluid"></a>
                        <div class="course-name">
                            <h4><a href="#">{{$course->tutor->user->name}}</a></h4>
                            <p>Instructor</p>
                        </div>
                    </div>
                </div>
                <h3 class="title instructor-text">
                    <a href="{{route('tutor.course.show', $course->slug)}}">{{ mb_strimwidth($course->title, 0, 25, '...')}}</a>
                </h3>
                <div class="course-info d-flex align-items-center">
                    <div class="rating-img d-flex align-items-center">
                        <img src="/assets/img/icon/icon-01.svg" alt="Img">
                        <p>{{$course->modules->count()}} modules</p>
                    </div>
                    <div class="course-view d-flex align-items-center">
                        <img src="/assets/img/icon/people.svg" alt="Img">
                        <p>{{$course->enrollments_count}} enrollments</p>
                    </div>
                </div>
                {{-- @if (tutorId() == $course->tutor_id)
                    <div class="course-edit-btn d-flex align-items-center justify-content-between">
                        <a href="#"><i class="bx bx-edit me-2"></i>Edit</a>
                        <a href="#"><i class="bx bx-trash me-2"></i>Delete</a>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
</div>
