@extends('layout.app')

@section('title')
    All courses
@endsection

@section('body')
    <div class="main-wrapper container">

        <section class="course-content" style="margin-top: 6em">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12">

                        <form action="">
                            <div class="showing-list">
                                <div class="row">

                                    <div class="col-md-5 col-sm-12">
                                        <div class="show-filter add-course-info">
                                            <div class="row gx-2 align-items-center">
                                                <div class="col-md-12 col-item">
                                                    <div class=" search-group">
                                                        <i class="feather-search"></i>
                                                        <input type="text" class="form-control" name="course"
                                                            value="{{ request()->course }}"
                                                            placeholder="Search our courses">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-12 col-item">
                                        <div class="input-block select-form mb-0">
                                            <select class="form-select select" id="sel1" name="category">
                                                <option value="">All categories</option>
                                                @forelse ($categories as $category)
                                                    <option @selected($category == request()->category) value="{{ $category }}">
                                                        {{ $category }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-item">
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            @forelse ($courses as $course)
                                <div class="col-lg-4 col-md-6 d-flex">

                                    <x-course-card :course="$course" />
                                </div>
                            @empty
                                <div class="alert alert-info">No courses added yet!</div>
                            @endforelse
                        </div>

                        <div class="row">
                            {{ $courses->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
