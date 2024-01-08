
<div class="my_listing">
    <form method="POST" action="{{ route('dashboard.listings.store') }}" enctype="multipart/form-data">
        @csrf
        <h4>Create Listing</h4>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="title">Title</label>
                    <div class="input_area">
                        <input type="text" id="title" name="title" placeholder="Title *" value="{{ old('title') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="category">Category</label>
                    <div class="input_area">
                        <select class="select_2" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="location">Location</label>
                    <div class="input_area">
                        <select class="select_2" name="location_id">
                            <option value="">Select Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" @selected(old('location_id') == $location->id)>{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="address">Address</label>
                    <div class="input_area">
                        <input type="text" id="address" name="address" placeholder="Address *" value="{{ old('address') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="phone">Phone</label>
                    <div class="input_area">
                        <input type="text" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="email">Email</label>
                    <div class="input_area">
                        <input type="email" id="email" name="email" placeholder="Email *" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="my_listing_single">
                    <label for="website">Website</label>
                    <div class="input_area">
                        <input type="text" id="website" name="website" placeholder="Web" value="{{ old('website') }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="my_listing_single mar_bottom">
                    <label for="google_map_embed_code">Google Map Embed Code</label>
                    <div class="input_area">
                        <textarea id="google_map_embed_code" name="google_map_embed_code" cols="3" rows="5" placeholder="Map *">{{ old('google_map_embed_code') }}</textarea>
                    </div>
                </div>
            </div>
            <!-- Include other fields similarly -->
        </div>
    </form>
</div>

