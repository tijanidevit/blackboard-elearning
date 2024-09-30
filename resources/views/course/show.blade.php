@extends('layout.app')

@section('title')
    {{ $course->title }}
@endsection

@section('body')
    <div class="main-wrapper container">

        <div style="margin-top: 6em !important">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-banner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="instructor-wrap border-bottom-0 mb-4">
                                            <div class="about-instructor align-items-center">
                                                <div class="abt-instructor-img">
                                                    <a href="#"><img src="{{ $course->tutor->image }}" alt="img"
                                                            class="img-fluid"></a>
                                                </div>
                                                <div class="instructor-detail me-3">
                                                    <h5><a href="#">{{ $course->tutor->user->name }}</a></h5>
                                                    <p>{{ $course->tutor->occupation }}</p>
                                                </div>
                                            </div>
                                            <span class="web-badge mb-3">{{ $course->category }}</span>
                                        </div>
                                        <h2>{{ $course->title }}</h2>
                                        <p>{{ $course->tagline }}</p>
                                        <div class="course-info d-flex align-items-center border-bottom-0 m-0 p-0">
                                            <div class="cou-info">
                                                <img src="/assets/img/icon/icon-01.svg" alt="Img">
                                                <p>{{ $course->modules->count() }} Modules</p>
                                            </div>
                                            <div class="cou-info">
                                                <img src="/assets/img/icon/people.svg" alt="Img">
                                                <p>{{ $course->enrollments_count }} enrolled</p>
                                            </div>
                                            <div class="cou-info">
                                                <img src="/assets/img/icon/notification.svg" alt="Img">
                                                <p>Status: <span
                                                        class="text-title badge badge-{{ $course->status_color }}">{{ $course->status }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="my-5">
                                            <a href="" class="btn btn-primary w-25">Enroll</a>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="sidebar-se">
                                            <div class="video-sec vid-bg">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ $course->preview_video_url ?? '#' }}"
                                                            {{ $course->preview_video_url ? 'target="_blank"' : '' }}
                                                            class="video-thumbnail" data-fancybox>
                                                            @if ($course->preview_video_url)
                                                                <div class="play-icon">
                                                                    <i class="fa-solid fa-play"></i>
                                                                </div>
                                                            @endif
                                                            <img class src="{{ $course->image }}" alt="Img">
                                                        </a>
                                                        <div class="video-details">
                                                            <div class="course-fee">
                                                                <h2>FREE</h2>
                                                                <p>&#8358;0 - 100% off</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 ">
                        <div class="card overview-sec">
                            <div class="card-body">
                                <x-success-alert key="status-success" />
                                <div class="d-flex justify-content-between justify-items-center mb-3">
                                    <h5 class="subs-title">Description</h5>
                                </div>
                                {!! $course->description !!}
                            </div>
                        </div>


                        <div class="card content-sec">
                            <div class="card-body">

                                @error('title')
                                    <div class="alert alert-warning my-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <x-success-alert />
                                <div class="row my-2">
                                    <div class="col-sm-6">
                                        <h5 class="subs-title">Course Module</h5>
                                    </div>
                                </div>


                                <div id="accordion">
                                    @forelse ($course->modules as $module)
                                        <div class="course-card my-2">
                                            <h6 class="cou-title mb-0">
                                                <a class="collapsed" data-toggle="collapse"
                                                    href="#module{{ $module->id }}"
                                                    aria-expanded="false">{{ $module->title }}</a>
                                            </h6>
                                            <div id="module{{ $module->id }}" class="card-collapse collapse px-2" style>
                                                <div class="d-flex justify-content-end mt-2 mb-4">
                                                </div>
                                                <ul>
                                                    @forelse ($module->contents as $content)
                                                        <li>
                                                            <p><img src="/assets/img/icon/play.svg" alt="Img"
                                                                    class="me-2">{{ $content->title }}
                                                            </p>
                                                            <div>
                                                                {{-- <a href="{{route('module.content.show', [$module->id, $content->id])}}">View</a> --}}
                                                                <span>{{ $content->complete_timeframe }}</span>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <p>No contents added yet to this module!</p>
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No modules added yet!</p>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                        <div class="card instructor-sec">
                            <div class="card-body">
                                <h5 class="subs-title">About the instructor</h5>
                                <div class="instructor-wrap">
                                    <div class="about-instructor">
                                        <div class="abt-instructor-img">
                                            <a href="#"><img src="{{ $course->tutor->image }}" alt="img"
                                                    class="img-fluid"></a>
                                        </div>
                                        <div class="instructor-detail">
                                            <h5><a href="#">{{ $course->tutor->user->name }}</a></h5>
                                            <p>{{ $course->tutor->occupation }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <p>{{ $course->tutor->bio }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
