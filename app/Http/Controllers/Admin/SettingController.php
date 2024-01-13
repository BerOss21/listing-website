<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Cache;
use Config;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create()
    {
        $settings=Config::get('settings');

        return view('admin.dashboard.settings.create',compact('settings'));
    }

    public function store(SettingRequest $request)
    {

        foreach($request->validated() as $key=>$value)
        {
            Setting::updateOrCreate(compact('key'),compact('value'));
        }

        Cache::forget('settings');

        toastr('Settings updated successfully');

        return back();
    }
}
