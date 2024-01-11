<?php

namespace App\Http\Controllers\Admin\Listing;

use App\Models\Listing;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Listing\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Video::class, 'video');
    }

    public function create(Listing $listing)
    {
        return view('admin.dashboard.sections.listings.videos.create',[
            'listing'=>$listing->load(['videos'=>fn($q)=>$q->orderByDesc('id')])
        ]);
    }

    public function store(VideoRequest $request,Listing $listing)
    {
        $listing->videos()->create($request->validated());

        toastr()->success('Video has been created successfully!');

        return back();
    }

    public function destroy(Listing $listing,Video $video)
    {
        $video->delete();

        toastr()->success('Video has been deleted successfully!');

        return back();
    }
}
