<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('frontend.dashboard.profile.index');
    }

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        toastr()->success('Profile has been updated successfully!');

        return back();
    }
}
