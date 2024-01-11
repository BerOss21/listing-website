<div class="btn-group">
    <a href="{{route('listings.edit',$id)}}" class="btn btn-sm btn-primary mr-1" data-action="edit">Edit</a>
    <button class="btn btn-sm btn-danger listing-delete mr-1" data-url="{{route('listings.destroy',$id)}}">Delete</button>
    <div class="dropdown d-inline">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('listings.images.create',$id) }}">Image gallery</a>
            <a class="dropdown-item" href="{{ route('listings.videos.create',$id) }}">Video gallery</a>
            <a class="dropdown-item" href="{{ route('listings.schedules.index',$id) }}">Schedules</a>
        </div>
    </div>
</div>