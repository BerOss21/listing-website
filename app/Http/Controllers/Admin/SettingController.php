<?php

namespace App\Http\Controllers\Admin;

use Cache;
use Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Intl\Timezones;
use Symfony\Component\Intl\Currencies;
use App\Http\Requests\Admin\SettingRequest;

class SettingController extends Controller
{
    public function create()
    {
        $currencies = Currencies::getNames();
        $timezones = Timezones::getNames();

        return view('admin.dashboard.settings.create',compact('currencies','timezones'));
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
