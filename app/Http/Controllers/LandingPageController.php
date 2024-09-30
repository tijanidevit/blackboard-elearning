<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Enums\CourseCategoryEnum;
use App\Models\Course;
use App\Models\User;

class LandingPageController extends Controller
{
    public function __invoke() : View {

    $courses = Course::latest()->withCount('enrollments')->with('modules', 'tutor.user')->take(6)->get();
    $categories = CourseCategoryEnum::toArray();

    $studentsCount = User::onlyStudent()->count();
    $tutorsCount = User::onlyTutor()->count();
    $coursesCount = Course::onlyPublished()->count();

    return view('welcome', compact('courses', 'categories', 'studentsCount', 'tutorsCount', 'coursesCount'));
    }
}
