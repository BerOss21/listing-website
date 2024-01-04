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
    /**
     * Display a listing of the resource.
     */
    public function index(LocationsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.locations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.sections.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        Location::create($request->validated());

        toastr()->success('Location has been created successfully!');

        return to_route('admin.sections.locations.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('admin.dashboard.sections.locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        toastr()->success('Location has been updated successfully!');

        return to_route('admin.sections.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        if(request()->ajax())
        {
            return response('',Response::HTTP_NO_CONTENT);
        }

        toastr()->success('Location has been deleted successfully!');

        return back();
    }
}
