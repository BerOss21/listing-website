<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LocationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocationController extends Controller
{
    public function index(LocationsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.locations.index');
    }

    public function create()
    {
        return view('admin.dashboard.sections.locations.create');
    }

    public function store(LocationRequest $request)
    {
        Location::create($request->validated());

        toastr()->success('Location has been created successfully!');

        return to_route('admin.sections.locations.index');
    }

    public function edit(Location $location)
    {
        return view('admin.dashboard.sections.locations.edit',compact('location'));
    }

    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        toastr()->success('Location has been updated successfully!');

        return to_route('admin.sections.locations.index');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Location has been deleted successfully!');

        return back();
    }
}
