<?php

namespace App\Http\Controllers\Admin\Listing;

use App\Models\Listing;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Listing\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    public function create($id)
    {
        return view('admin.dashboard.sections.listings.videos.create',[
            'listing'=>Listing::with(['videos'=>fn($q)=>$q->orderByDesc('id')])
                        ->select('id','title')
                        ->firstOrFail($id)
        ]);
    }

    public function store(VideoRequest $request,Listing $listing)
    {
        $listing->videos()->create($request->validated());

        toastr()->success('Video has been created successfully!');

        return back();
    }

    public function delete(Listing $listing,Video $video)
    {
        $video->delete();

        toastr()->success('Video has been deleted successfully!');

        return back();
    }
}
