<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutor\Profile\UpdateProfileRequest;
use App\Models\Tutor;
use App\Models\User;
use App\Traits\FileTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FileTrait;
    public function index() : View {
        $user = User::with('tutor')->where('id', auth()->id())->first();
        return view('tutor.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request) : RedirectResponse {
        $data = $request->validated();
        $previousImage = auth()->user()->tutor?->image;

        if (isset($data['image'])) {
            $data['image'] = $this->uploadFile('tutor', $data['image']);
        }

        Tutor::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        if ($previousImage) {
            $this->deleteFile($previousImage);
        }

        return back()->with('success', 'Profile updated successfully!');
    }
}
