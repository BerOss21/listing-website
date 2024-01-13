<div class="btn-group">
    <a href="{{route('admin.sections.listings.edit',$slug)}}" class="btn btn-sm btn-primary mr-1" data-action="edit">Edit</a>
    <button class="btn btn-sm btn-danger listing-delete mr-1" data-url="{{route('admin.sections.listings.destroy',$slug)}}">Delete</button>
    <div class="dropdown d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('admin.sections.listings.images.create',$slug) }}">Image gallery</a>
            <a class="dropdown-item" href="{{ route('admin.sections.listings.videos.create',$slug) }}">Video gallery</a>
            <a class="dropdown-item" href="{{ route('admin.sections.listings.schedules.index',$slug) }}">Schedules</a>
        </div>
    </div>
</div>