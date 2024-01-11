<div class="my_listing list_mar">
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="my_listing_single">
                <label>Allow Feature</label>
                <div class="input_area">
                    <div class="wsus__search_area">
                        <select class="select_2" name="is_featured">
                            <option value="1" @selected(old('is_feartured',$listing->is_featured)==true)>yes</option>
                            <option value="0" @selected(old('is_feartured',$listing->is_featured)==false)>no </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="my_listing_single">
                <label>Seo Title</label>
                <div class="input_area">
                    <div class="input_area">
                        <input type="text" name="seo_title" placeholder="Seo Title" value="{{ old('seo_title',$listing->seo_title) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="my_listing_single">
                <label>Seo Description</label>
                <div class="input_area">
                    <textarea cols="3" rows="5" name="seo_description" placeholder="Your Text">{{ old('seo_description',$listing->seo_description) }}</textarea>
                </div>
            </div>
            <!-- <button type="submit" class="read_btn">save</button> -->
        </div>
    </div>
</div>