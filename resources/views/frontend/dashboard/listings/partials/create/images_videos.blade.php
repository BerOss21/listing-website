<div class="my_listing list_mar list_padding">
    <h4>Video and Image</h4>
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div id="medicine_row">
                <label for="images">Images</label>
                <div class="medicine_row_input">
                    <input type="file" name="images[]" id="images" multiple>
                    <button type="button" id="add_row"><i class="fas fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="my_listing_single">
                <label for="thumbnail_image">Thumbnail Image</label>
                <div class="input_area input_area_2">
                    <input type="file" id="thumbnail_image" name="thumbnail_image" aria-label="Upload">
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="my_listing_single">
                <label for="attachment">Attachment</label>
                <div class="input_area input_area_2">
                    <input type="file" id="attachment" name="attachment" aria-label="Upload">
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div id="medicine_row2">
                <label for="videos">Videos <span>(Maximum videos-10)</span></label>
                <div class="medicine_row_input inpiut_pad">
                    <input type="text" placeholder="www.youtube.com" name="videos[]" id="videos">
                    <button type="button" id="add_row2"><i class="fas fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>