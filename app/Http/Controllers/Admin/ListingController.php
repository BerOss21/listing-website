<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Listing\FormData;
use App\Actions\Listing\SaveListing;
use App\Actions\Listing\UpdateListing;
use App\Models\Listing;
use App\Http\Controllers\Controller;
use App\DataTables\ListingsDataTable;
use App\Http\Requests\Admin\ListingRequest;
use Symfony\Component\HttpFoundation\Response;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(ListingsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.listings.index');
    }

    public function create(FormData $action)
    {
        return view('admin.dashboard.sections.listings.create',$action->getData());
    }

    public function store(ListingRequest $request, SaveListing $action)
    {
        $action->save($request->validated());

        toastr()->success('Data has been created successfully!');

        return to_route('admin.sections.listings.index'); 
    }

    public function edit(Listing $listing,FormData $action)
    {
        return view('admin.dashboard.sections.listings.edit',[...compact('listing'),...$action->getData()]);
    }

    public function update(ListingRequest $request, Listing $listing,UpdateListing $action)
    {
        $action->update($request->validated(),$listing);

        toastr()->success('Data has been updated successfully!');

        return to_route('admin.sections.listings.index'); 
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Data has been deleted successfully!');

        return to_route('admin.sections.listings.index'); 
    }
}
