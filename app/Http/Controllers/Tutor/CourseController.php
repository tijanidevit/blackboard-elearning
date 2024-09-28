<?php

namespace App\Http\Controllers\Tutor;

use App\Enums\CourseCategoryEnum;
use App\Enums\CourseStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\Course\AddModuleRequest;
use App\Http\Requests\Tutor\Course\StoreCourseRequest;
use App\Models\Course;
use App\Models\CourseModule;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    use FileTrait;

    public function index(): View
    {
        $tutor = tutor();
        $courses = $tutor->courses()->with('tutor.user')->withCount('enrollments')->latest()->paginate();


        $totalCourses = $tutor->courses->count();
        $publishedCourses = $tutor->courses()->onlyPublished()->count();
        return view('tutor.course.index', compact('courses', 'totalCourses', 'publishedCourses'));
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

    public function updateStatus($id): RedirectResponse
    {
        $tutor = tutor();
        $course = $tutor->courses()->where('id', $id)->with('tutor.user', 'modules.contents')->withCount('enrollments')->firstOrFail();

        $status = CourseStatusEnum::PUBLISHED->value;
        if ($course->status == $status) {
            $status = CourseStatusEnum::DRAFT->value;
        }
        $course->update(['status' => $status]);

        return back()->with('status-success', 'Course status updated successfully');
    }

    public function addModule(AddModuleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        CourseModule::create($data);

        return back()->with('success', 'Module added successfully');
    }
}
