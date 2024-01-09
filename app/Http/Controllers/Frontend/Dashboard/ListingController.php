<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Actions\Listing\FormData;
use App\Actions\Listing\SaveListing;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ListingRequest;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings=auth()->user()->listings()->with('location')->latest()->paginate(5);

        return view('frontend.dashboard.listings.index',compact('listings'));
    }

    public function create(FormData $action)
    {
        return view('frontend.dashboard.listings.create',$action->getData());
    }
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingRequest $request,SaveListing $action)
    {
        $action->save($request->validated());

        toastr()->success('Data has been created successfully!');

        return to_route('dashboard.listings.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}