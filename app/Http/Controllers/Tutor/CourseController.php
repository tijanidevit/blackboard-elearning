<?php

namespace App\Http\Controllers\Tutor;

use App\Enums\CourseCategoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\Course\AddModuleRequest;
use App\Http\Requests\Tutor\Course\StoreCourseRequest;
use App\Models\Course;
use App\Models\CourseModule;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    use FileTrait;

    public function index(): View
    {
        $tutor = auth()->user()->tutor;

        $totalCourses = $tutor->courses->count();
        return view('tutor.dashboard');
    }

    public function create(): View
    {
        $categories = CourseCategoryEnum::toArray();
        return view('tutor.course.create', compact('categories'));
    }

    public function show($slug): View
    {
        $tutor = tutor();
        $course = $tutor->courses()->where('slug', $slug)->with('tutor.user', 'modules.contents')->withCount('enrollments')->firstOrFail();
        return view('tutor.course.show', compact('course'));
    }

    public function store(StoreCourseRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile('courses/image', $data['image']);
        $data['cover_image'] = $this->uploadFile('courses/cover_image', $data['cover_image']);

        $data['tutor_id'] = tutorId();
        $course = Course::create($data);

        return to_route('tutor.course.show', $course->slug);
    }

    public function addModule(AddModuleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        CourseModule::create($data);

        return back()->with('success', 'Module added successfully');
    }
}
