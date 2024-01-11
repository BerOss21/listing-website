<?php

namespace App\Http\Controllers\Admin\Listing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Listing\ImageRequest;
use App\Models\Image;
use App\Models\Listing;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Image::class, 'image');
    }

    public function create(Listing $listing)
    {
        return view('admin.dashboard.sections.listings.images.create',[
            'listing'=>$listing->load(['images'=>fn($q)=>$q->orderByDesc('id')])
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
