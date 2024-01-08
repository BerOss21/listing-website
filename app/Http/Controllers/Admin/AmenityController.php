<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenitiesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityRequest;
use App\Models\Amenity;
use Symfony\Component\HttpFoundation\Response;

class AmenityController extends Controller
{
    public function index(AmenitiesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.amenities.index');
    }

    public function create()
    {
        return view('admin.dashboard.sections.amenities.create');
    }

    public function store(AmenityRequest $request)
    {
        Amenity::create($request->validated());

        toastr()->success('Amenity has been created successfully!');

        return to_route('admin.sections.amenities.index');
    }

    public function edit(Amenity $amenity)
    {
        return view('admin.dashboard.sections.amenities.edit',compact('amenity'));
    }

    public function update(AmenityRequest $request, Amenity $amenity)
    {
        $amenity->update($request->validated());

        toastr()->success('Amenity has been updated successfully!');

        return to_route('admin.sections.amenities.index');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);
        
        toastr()->success('Amenity has been deleted successfully!');

        return back();
    }
}
