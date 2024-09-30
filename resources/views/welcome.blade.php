@extends('layout.app')

@section('title')
    Home
@endsection


@section('body')
    <section class="home-slide d-flex align-items-center">
        <div class="container">
            <div class="row ">
                <div class="col-md-7">
                    <div class="home-slide-face">
                        <div class="home-slide-text ">
                            <h5>The Leader in Online Learning</h5>
                            <h1>Engaging & Accessible Online Courses For All</h1>
                            <p>Own your future learning new skills online</p>
                        </div>
                        <div class="banner-content">
                            <form class="form" action="{{route('course.index')}}">
                                <div class="form-inner">
                                    <div class="input-group">
                                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                                        <input type="search" name="course" class="form-control"
                                            placeholder="Search course">
                                        <span class="drop-detail">
                                            <select name="category" class="form-select select">
                                                <option value="">Category</option>
                                                @forelse ($categories as $category)
                                                    <option value="{{ $category }}">{{ $category }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </span>
                                        <button class="btn btn-primary sub-btn" type="submit">
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="trust-user">
                            <p>Trusted by over 15K Users <br>worldwide since 2024</p>
                            <div class="trust-rating d-flex align-items-center">
                                <div class="rate-head">
                                    <h2><span>1000</span>+</h2>
                                </div>
                                <div class="rating d-flex align-items-center">
                                    <h2 class="d-inline-block average-rating">4.4</h2>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center">
                    <div class="girl-slide-img">
                        <img src="/assets/img/object.png" alt="Img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section student-course">
        <div class="container">
            <div class="course-widget">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="course-full-width">
                            <div class="blur-border course-radius align-items-center aos" data-aos="fade-up">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img">
                                        <img src="/assets/img/pencil-icon.svg" alt="Img">
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ $coursesCount }}</span></h4>
                                        <p>Online Courses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex">
                        <div class="course-full-width">
                            <div class="blur-border course-radius aos" data-aos="fade-up">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img">
                                        <img src="/assets/img/cources-icon.svg" alt="Img">
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ $tutorsCount }}</span></h4>
                                        <p>Expert Tutors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 d-flex">
                        <div class="course-full-width">
                            <div class="blur-border course-radius aos" data-aos="fade-up">
                                <div class="online-course d-flex align-items-center">
                                    <div class="course-img">
                                        <img src="/assets/img/gratuate-icon.svg" alt="Img">
                                    </div>
                                    <div class="course-inner-content">
                                        <h4><span>{{ $studentsCount }}</span></h4>
                                        <p>Online Students</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section how-it-works">
        <div class="container">
            <div class="section-header aos" data-aos="fade-up">
                <div class="section-sub-head">
                    <span>Discover</span>
                    <h2>Our Latest Courses</h2>
                </div>
                <div class="all-btn all-category d-flex align-items-center">
                    <a href="" class="btn btn-primary">Browse All Courses</a>
                </div>
            </div>
            <div class="section-text aos" data-aos="fade-up">
                <p class="mb-0">Explore new skills and advance your career with our expert-led courses. Stay ahead of the
                    curve with the latest content designed to help you succeed in your learning journey.</p>
            </div>

            <div class="course-feature">
                <div class="row">
                    @forelse ($courses as $course)
                    <div class="col-lg-4 col-md-6 d-flex">

                        <x-course-card :course="$course" />
                    </div>
                    @empty
                        <div class="alert alert-info">No courses added yet!</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
