<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ClaimRequest;
use App\Models\Listing;

class ClaimController extends Controller
{
    public function __invoke(ClaimRequest $request,Listing $listing)
    {
        $listing->claims()->create($request->validated());

        toastr()->success('Your claim was sent successfully to administration');

        return back();
    }
}
