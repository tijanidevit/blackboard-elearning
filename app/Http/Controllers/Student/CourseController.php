<?php

namespace App\Http\Controllers\Student;

use App\Enums\CourseCategoryEnum;
use App\Enums\CourseStatusEnum;
use App\Enums\EnrollmentStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\Course\AddModuleRequest;
use App\Http\Requests\Tutor\Course\StoreCourseRequest;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\CourseModule;
use App\Models\ModuleContent;
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
        return view('student.course.index', compact('courses', 'totalCourses', 'publishedCourses'));
    }

    public function show($slug): View
    {
        $enrollment = CourseEnrollment::where('student_id', auth()->id())
            ->with('course')
            ->whereHas('course', function ($query) use($slug) {
                $query->where('slug', $slug)->with('tutor.user', 'modules.contents')->withCount('enrollments');
            })
            ->firstOrFail();

        $course = $enrollment->course;
        return view('student.course.show', compact('course', 'enrollment'));
    }

    public function class($slug, $contentId): View
    {
        $enrollment = CourseEnrollment::where('student_id', auth()->id())
            ->with('course')
            ->whereHas('course', function ($query) use($slug) {
                $query->where('slug', $slug)->with('tutor.user', 'modules.contents')->withCount('enrollments');
            })
            ->firstOrFail();

        $course = $enrollment->course;
        $content = ModuleContent::findOrFail($contentId);

        if (!$enrollment->status) {
            $enrollment->status = EnrollmentStatusEnum::ONGOING->value;
            $enrollment->save();
        }

        return view('student.course.class', compact('course', 'content'));
    }

    public function enroll($courseId): RedirectResponse
    {
        $data = ['student_id' => auth()->id(), 'course_id' => $courseId];
        CourseEnrollment::updateOrCreate($data, $data);

        $course = Course::find($courseId);

        return to_route('student.course.show', $course->slug);
    }

    public function complete($courseId): RedirectResponse
    {
        $enrollment = CourseEnrollment::where('student_id', auth()->id())->where('course_id', $courseId)
            ->firstOrFail();

        if (!$enrollment->status) {
            return back()->with('warning', 'Course not yet started');
        }

        $enrollment->status = EnrollmentStatusEnum::COMPLETED->value;
        $enrollment->save();
        return back()->with('status-success', 'Course marked complete successfully');
    }


    public function enrolled(): View
    {
        $student = auth()->user();

        $enrollmentQuery = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('student_id', auth()->id());
        });

        $enrollments = $enrollmentQuery->onlyOngoing()
            ->with([
                'course' => function ($query) {
                    $query->withCount('enrollments');
                },
            ])
            ->latest()
            ->paginate();


        return view('student.course.enrolled', compact('enrollments'));
    }

    public function completed(): View
    {
        $student = auth()->user();

        $enrollmentQuery = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('student_id', auth()->id());
        });

        $enrollments = $enrollmentQuery->onlyCompleted()
            ->with([
                'course' => function ($query) {
                    $query->withCount('enrollments');
                },
            ])
            ->latest()
            ->paginate();


        return view('student.course.completed', compact('enrollments'));
    }
}
