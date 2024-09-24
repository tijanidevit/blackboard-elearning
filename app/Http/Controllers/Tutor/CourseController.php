<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index() : View {

        $totalEnrolledCourses = CourseEnrollment::whereHas('course', function ($query) {
            $query->where('tutor_id', auth()->id());
        });
        return view('tutor.dashboard');
    }
}
