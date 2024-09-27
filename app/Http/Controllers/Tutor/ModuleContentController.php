<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\Course\AddModuleRequest;
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
        return view('tutor.content.create', compact('module'));
    }

    public function addContent(AddModuleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['image'] = $this->uploadFile('courses/image', $data['image']);
        $data['cover_image'] = $this->uploadFile('courses/cover_image', $data['cover_image']);
        ModuleContent::create($data);

        return back()->with('success', 'Module added successfully');
    }
}
