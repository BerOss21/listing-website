<form action="{{route('pages.listings')}}">
    <h3>Find the Best Place Title</h3>
    <div class="wsus__search_area">
        <input type="text" name='search' placeholder="What we are looking for?">
    </div>
    <div class="wsus__search_area">
        <select class="select_2" name="category">
            <option value="">categories</option>
            @foreach($categories as $category)
            <option value="{{$category->slug}}">{{ $category->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="wsus__search_area">
        <select class="select_2" name="location">
            <option value="">locations</option>
            @foreach($locations as $location)
            <option value="{{$location->slug}}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="wsus__search_area m-0">
        <button class="read_btn" type="submit">search</button>
        <!-- <a href="#" class="read_btn">search</a> -->
    </div>
</form>