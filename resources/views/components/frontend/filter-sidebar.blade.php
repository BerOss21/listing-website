<form action="{{route('pages.listings')}}">
    <div class="listing_grid_sidbar">
        <div class="sidebar_line">
            <input type="text" name='search' value="{{request()->query('search',null)}}" placeholder="Search" id="listing_filter_search">
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
        <div class="sidebar_line_select">
            <select class="select_2" name="category">
                <option value="">categories</option>
                @foreach($categories as $category)
                    <option value="{{$category->slug}}" @selected(request()->query('category')==$category->slug)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="sidebar_line_select">
            <select class="select_2" name="location">
                <option value="">locations</option>
                @foreach($locations as $location)
                    <option value="{{$location->slug}}" @selected(request()->query('location')==$location->slug)>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="wsus__pro_check">
            @foreach($amenities as $amenity)
                <div class="form-check">
                    <input class="form-check-input" name='amenities[]' type="checkbox" @checked(is_array(request()->query('amenities')) && in_array($amenity->slug,request()->query('amenities'))) value="{{$amenity->slug}}" id="flexCheckIndeterminate4">
                    <label class="form-check-label" for="flexCheckIndeterminate4">
                        {{$amenity->name}}
                    </label>
                </div>
            @endforeach
        </div>
        <button class="read_btn" type="submit">search</button>
    </div>
</form>

