<?php

namespace App\Http\Controllers\Admin\Listing;

use Schema;
use App\Enums\Days;
use App\Models\Listing;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\DataTables\SchedulesDataTable;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\Listing\ScheduleRequest;

class ScheduleController extends Controller
{
    public function index($id,SchedulesDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.listings.schedules.index',[
            'listing'=>Listing::select('id','title')
                    ->with(['schedules'=>fn($query)=>$query->orderByDesc('id')])
                    ->firstOrFail($id)
        ]);
    }

    public function create($id)
    {
        return view('admin.dashboard.sections.listings.schedules.create',[
            'listing'=>Listing::select('id','title')->firstOrFail($id),
            'days'=>Days::cases()
        ]);
    }

    public function store(ScheduleRequest $request,Listing $listing)
    {
        $listing->schedules()->create($request->validated());

        toastr()->success('Schedule has been saved succesfully');

        return to_route('admin.sections.listings.schedules.index',$listing->id);
    }

    public function edit(Listing $listing,Schedule $schedule)
    {
        return view('admin.dashboard.sections.listings.schedules.edit',[
            'schedule'=>$schedule,
            'listing'=>$listing,
        ]);
    }

    public function update(ScheduleRequest $request,Listing $listing,Schedule $schedule)
    {
        $schedule->update($request->validated());

        toastr()->success('Schedule has been updated succfully');

        return to_route('admin.sections.listings.schedules.index',$listing->id);
    }

    public function destroy(Listing $listing,Schedule $schedule)
    {
        $schedule->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('Schedule has been deleted successfully!');

        return back();
    }
}
