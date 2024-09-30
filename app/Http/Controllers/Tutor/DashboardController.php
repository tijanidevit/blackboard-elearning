<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View {

        $tutor = tutor();

        $enrollmentQuery = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('tutor_id', tutor()->id);
        });

        $totalEnrolledCourses = $enrollmentQuery->count();

        $totalCourses = $tutor->courses->count();
        $activeCourses = $tutor->courses()->onlyPublished()->count();

        $latestCourses = $tutor->courses()->withCount('enrollments')->latest()->limit(5)->get();

        $latestEnrollments = $enrollmentQuery->with('course')->latest()->limit(5)->get();

        return view('tutor.dashboard', compact('totalEnrolledCourses', 'totalCourses', 'activeCourses', 'latestCourses', 'latestEnrollments'));
    }
}
