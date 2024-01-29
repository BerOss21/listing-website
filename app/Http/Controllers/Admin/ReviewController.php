<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\DataTables\ReviewsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewRequest;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    public function index(ReviewsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.reviews.index');
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());

        if($request->ajax()) return response('Review status updated successfully');

        toastr()->success('Review status updated');

        return back();
    }

    public function destroy(Review $review)
    {
        $review->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Review deleted successfully');

        return back();
    }
}
