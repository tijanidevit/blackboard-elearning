<?php

namespace App\Http\Controllers;

use App\Enums\CourseCategoryEnum;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $categories = CourseCategoryEnum::toArray();
        $courses = Course::with('tutor.user')
            ->with('tutor.user', 'modules')
            ->onlyPublished()
            ->withCount('enrollments')
            ->latest()
            ->where(function ($query) {
                $query->search('title', request()->course)
                ->filterBy('category', request()->category);
            })
            ->paginate();
        return view('course.index', compact('courses', 'categories'));
    }

    public function show($slug): View
    {
        $course = Course::where('slug', $slug)->onlyPublished()->with('tutor.user', 'modules.contents')->withCount('enrollments')->firstOrFail();
        return view('course.show', compact('course'));
    }
}
