<div class="my_listing list_mar list_padding">
    <h4>Listing Details Information</h4>
    <div class="row">
        <div class="col-xl-12">
            <div class="my_listing_single">
                <label>Description</label>
                <textarea name="description" class="form-control summer_note">{{ old('description',$listing->description) }}</textarea>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="my_listing_single">
                <label>Expire date</label>
                <input type="date" name="expire_date" value="{{ old('expire_date',$listing->expire_date->format('Y-m-d')) }}" class="form-control">
            </div>
        </div>
    </div>
</div>