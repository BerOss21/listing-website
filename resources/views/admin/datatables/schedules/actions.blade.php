<div class="btn-group">
    <a href="{{route('admin.sections.listings.schedules.edit',['listing'=>$listing_slug,'schedule'=>$schedule_id])}}" class="btn btn-sm btn-primary mr-1" data-action="edit">Edit</a>
    <button class="btn btn-sm btn-danger schedule-delete" data-url="{{route('admin.sections.listings.schedules.destroy',[$listing_slug,$schedule_id])}}">Delete</button>
</div>
