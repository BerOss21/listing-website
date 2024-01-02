<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.profile.index');
    }

    public function update(ProfileRequest $request)
    {
        // dd($request->validated());
        auth()->user()->update($request->validated());

        toastr()->success('Profile has been updated successfully!');

        return back();
    }

}
