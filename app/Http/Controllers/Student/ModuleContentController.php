<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseModule;
use App\Models\ModuleContent;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ModuleContentController extends Controller
{
    use FileTrait;

    public function create($moduleId): View
    {
        $module = CourseModule::where('id', $moduleId)->with('course')->firstOrFail();
        return view('student.content.create', compact('module'));
    }

    public function show($moduleId, $contentId): View
    {
        $content = ModuleContent::where(['id' => $contentId, 'module_id' => $moduleId])->with('module.course')->firstOrFail();
        return view('student.content.show', compact('content'));
    }
}
