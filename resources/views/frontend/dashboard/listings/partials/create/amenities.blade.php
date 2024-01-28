<div class="my_listing list_mar list_padding">
    <h4>Amenities <span class="text-danger">(max:{{$max_amenities}})</span></h4>
    <div class="row">
        @forelse($amenities as $amenity)
        <div class="col-xl-6 col-xxl-4 col-md-6">
            <div class="amenities_check_area">
                <div class="wsus__pro_check">
                    <div class="form-check">
                        <input class="form-check-input" name="amenities[]" type="checkbox" @checked(in_array($amenity->id,old('amenities') ?? [])) value="{{ $amenity->id }}" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            {{ $amenity->name }}
                        </label>
                    </div>
                </div>
                <i class="{{ $amenity->icon }}"></i>
            </div>
        </div>
        @empty
            <div class="alert alert-info text-center">No amenity avaible</div>
        @endforelse
    </div>
</div>