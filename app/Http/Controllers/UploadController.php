<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = auth()->user();

        $request->validate([
            'avatar' => 'mimes:jpg,png'
        ]);

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        return redirect()->route('dashboard')->with('message', 'Avatar uploaded successfully');
    }
}
