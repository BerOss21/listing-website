<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenitiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenitiesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.amenities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.sections.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityRequest $request)
    {
        Amenity::create($request->validated());

        toastr()->success('Amenity has been created successfully!');

        return to_route('admin.sections.amenities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
        return view('admin.dashboard.sections.amenities.edit',compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityRequest $request, Amenity $amenity)
    {
        $amenity->update($request->validated());

        toastr()->success('Amenity has been updated successfully!');

        return to_route('admin.sections.amenities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        if(request()->ajax())
        {
            return response('',Response::HTTP_NO_CONTENT);
        }

        toastr()->success('Amenity has been deleted successfully!');

        return back();
    }
}
