<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\ModuleContent\StoreContentRequest;
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

    public function show($contentId): View
    {
        $module = CourseModule::where('id', $contentId)->with('module.course')->firstOrFail();
        return view('tutor.content.show', compact('module'));
    }

    public function store(StoreContentRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['file'] = isset($data['file']) ? $this->uploadFile('contents/file', $data['file']) : null;
        $data['video'] = isset($data['video']) ?  $this->uploadFile('contents/video', $data['video']) : null;

        ModuleContent::create($data);

        return back()->with('success', 'Content added successfully');
    }
}
