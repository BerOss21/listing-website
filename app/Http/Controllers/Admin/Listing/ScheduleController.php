<?php

namespace App\Http\Controllers\Admin\Listing;

use Schema;
use App\Enums\Days;
use App\Models\Listing;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\DataTables\SchedulesDataTable;
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
        $days= Days::cases(); 

        return view('admin.dashboard.sections.listings.schedules.create',[
            'listing'=>Listing::select('id','title')->firstOrFail($id),
            'days'=>$days
        ]);
    }

    public function store(ScheduleRequest $request,Listing $listing)
    {
        $listing->schedules()->updateOrCreate([
            'day'=>$request->validate('day')
        ],[
          $request->validate('start_time','end_time','status')  
        ]);

        toastr()->success('Schedule has been saved succesfully');

        return to_route('admin.sections.listings.schedules.index');
    }

    public function edit(Listing $listing,Schedule $schedule)
    {
        return view('admin.dashboard.sections.listings.schedules.edit',[
            'schdule'=>$schedule->load('listing:id,title')
        ]);
    }

    public function update(ScheduleRequest $request,Listing $listing,Schedule $schedule)
    {
        $schedule->update($request->validated());

        toastr()->success('Schedule has been updated succfully');

        return to_route('admin.sections.listings.schedules.index');
    }

    public function delete(Listing $listing,Schedule $schedule)
    {
        $schedule->delete();

        return back();
    }
}
