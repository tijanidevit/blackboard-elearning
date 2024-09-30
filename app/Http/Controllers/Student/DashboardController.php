<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $student = auth()->user();

        $enrollmentQuery = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('student_id', auth()->id());
        });

        $totalEnrolledCourses = $enrollmentQuery->count();
        $completedCourses = $enrollmentQuery->clone()->onlyCompleted()->count();
        $ongoingCourses = $enrollmentQuery->clone()->onlyOngoing()->count();

        $latestEnrollments = $enrollmentQuery->clone()->onlyOngoing()
            ->with([
                'course' => function ($query) {
                    $query->withCount('enrollments');
                },
            ])
            ->latest()
            ->limit(5)
            ->get();

        $latestCompletedEnrollments = $enrollmentQuery->clone()->onlyCompleted()
            ->with([
                'course' => function ($query) {
                    $query->withCount('enrollments');
                },
            ])
            ->latest()
            ->limit(5)
            ->get();


        return view('student.dashboard', compact('totalEnrolledCourses', 'latestEnrollments', 'completedCourses', 'latestCompletedEnrollments', 'ongoingCourses'));
    }
}
