<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View {

        $tutor = auth()->user()->tutor;

        $enrollmentQuery = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('tutor_id', auth()->id());
        });

        $totalEnrolledCourses = $enrollmentQuery->count();

        $totalCourses = $tutor->courses->count();
        $activeCourses = $tutor->courses()->onlyActive()->count();

        $latestCourses = $tutor->courses()->withCount('enrollments')->latest()->limit(5)->get();

        $latestEnrollments = $enrollmentQuery->with('course')->latest()->limit(5)->get();

        return view('tutor.dashboard', compact('totalEnrolledCourses', 'totalCourses', 'activeCourses', 'latestCourses', 'latestEnrollments'));
    }
}
