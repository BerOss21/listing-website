<?php

namespace App\Http\Controllers\Frontend\Dashboard\Listings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Listings\ImageRequest;
use App\Models\Image;
use App\Models\Listing;

class ImageController extends Controller
{
    public function create($id)
    {
        return view('frontend.dashboard.listings.images',[
            'listing'=>Listing::with(['images'=>fn($q)=>$q->orderByDesc('id')])
                        ->select('id','title')
                        ->firstOrFail($id)
        ]);
    }

    public function store(ImageRequest $request,Listing $listing)
    {
        $listing->images()->createMany($request->validated('images'));

        toastr()->success('Image has been created successfully!');

        return back();
    }

    public function destroy(Listing $listing,Image $image)
    {
        $image->delete();

        toastr()->success('Image has been deleted successfully!');

        return back();
    }
}
