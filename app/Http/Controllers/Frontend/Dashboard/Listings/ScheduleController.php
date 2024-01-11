<?php

namespace App\Http\Controllers\Frontend\Dashboard\Listings;

use App\Enums\Days;
use App\Models\Listing;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\Listing\ScheduleRequest;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Schedule::class, 'schedule');
    }

    public function index(Listing $listing)
    {
        return view('frontend.dashboard.listings.schedules.index',[
            'listing'=>$listing->load(['schedules'=>fn($query)=>$query->orderByDesc('id')])
        ]);
    }

    public function create(Listing $listing)
    {
        return view('frontend.dashboard.listings.schedules.create',[
            'listing'=>$listing,
            'days'=>Days::cases()
        ]);
    }

    public function store(ScheduleRequest $request,Listing $listing)
    {
        $listing->schedules()->create($request->validated());

        toastr()->success('Schedule has been saved succesfully');

        return to_route('dashboard.listings.schedules.index',$listing->id);
    }

    public function edit(Listing $listing,Schedule $schedule)
    {
        return view('frontend.dashboard.listings.schedules.edit',[
            'schedule'=>$schedule,
            'listing'=>$listing,
        ]);
    }

    public function update(ScheduleRequest $request,Listing $listing,Schedule $schedule)
    {
        $schedule->update($request->validated());

        toastr()->success('Schedule has been updated succfully');

        return to_route('dashboard.listings.schedules.index',$listing->id);
    }

    public function destroy(Listing $listing,Schedule $schedule)
    {
        $schedule->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Schedule has been deleted successfully!');

        return back();
    }
}
