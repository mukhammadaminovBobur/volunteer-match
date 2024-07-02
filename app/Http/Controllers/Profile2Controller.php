<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Auth;

class Profile2Controller extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bio' => 'required',
            'skills' => 'required',
            'interests' => 'required',
            'availability' => 'required',
        ]);

        $profile = new Profile();
        $profile->user_id = Auth::user()->id;
        $profile->bio = $request->bio;
        $profile->skills = $request->skills;
        $profile->interests = $request->interests;
        $profile->availability = $request->availability;
        $profile->save();

        return redirect()->route('profile.show', $profile->id)->with('success', 'Profile created successfully.');
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bio' => 'required',
            'skills' => 'required',
            'interests' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $profile = Profile::findOrFail($id);
        $profile->bio = $request->bio;
        $profile->skills = $request->skills;
        $profile->interests = $request->interests;
        $profile->availability = $request->start_time . ' - ' . $request->end_time;
        $profile->save();
        return redirect()->route('profile.show', $profile->id)->with('success', 'Profile updated successfully.');
    }

    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('profiles.show', compact('profile'));
    }
}
