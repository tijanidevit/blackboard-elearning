@extends('layout.app')

@section('title')
    {{ $content->title }}
@endsection

@section('body')
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div class="main-wrapper">

        <div style="margin-top: 6em !important">
            <div class="col-12 px-4">
                <div class="row">
                    <div class="col-12 px-5">
                        <h3>{{ $content->title }} - {{ $course->title }}</h3>
                    </div>
                    <div class="col-md-9">
                        <div class="video-container">
                            <video src="{{ $content->video }}" autoplay controls></video>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card content-sec">
                            <div class="card-body">

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

                                                            <p>
                                                                <a href="{{ route('student.course.class', [$course->slug, $content->id]) }}"><img
                                                                        src="/assets/img/icon/play.svg" alt="Img"
                                                                        class="me-2">{{ $content->title }}
                                                                </a>
                                                            </p>
                                                            <div>
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
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
