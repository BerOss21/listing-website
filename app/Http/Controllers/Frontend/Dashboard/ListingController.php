<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Actions\Listing\FormData;
use App\Actions\Listing\SaveListing;
use App\Actions\Listing\UpdateListing;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ListingRequest;
use App\Models\Listing;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
        
        $this->middleware('max_listings')->only(['create','store']);
    }

    public function index()
    {
        $listings=auth()->user()->listings()->with('location')->latest()->paginate(5);

        return view('frontend.dashboard.listings.index',compact('listings'));
    }

    public function create(FormData $action)
    {
        return view('frontend.dashboard.listings.create',$action->getData());
    }
  
    public function store(ListingRequest $request,SaveListing $action)
    {
        $action->save($request->validated());

        toastr()->success('Data has been created successfully!');

        return to_route('dashboard.listings.index'); 
    }

    public function edit(Listing $listing, FormData $action)
    {
        return view('frontend.dashboard.listings.edit',[...['listing'=>$listing->load('images','videos','amenities')],...$action->getData()]);
    }

    public function update(ListingRequest $request, Listing $listing, UpdateListing $action)
    {
        $action->update($request->validated(),$listing);

        toastr()->success('Data has been updated successfully!');

        return to_route('dashboard.listings.index'); 

    }   

    public function destroy(Listing $listing)
    {
        $listing->delete();

        toastr()->success('Data has been deleted successfully!');

        return to_route('dashboard.listings.index'); 
    }
}
