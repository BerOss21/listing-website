<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero=Hero::firstOr(function(){return new Hero;});

        return view('admin.dashboard.sections.hero.edit',compact('hero'));
    }

    public function update(HeroRequest $request)
    {
        Hero::updateOrCreate(['id'=>1],$request->validated());

        toastr()->success('Data has been updated successfully!');

        return back();
    }
}
