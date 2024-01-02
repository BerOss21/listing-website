<form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="form-group col-md-6 mb-4">
            <label class="">Avatar</label>
            <div id="image-preview" class="image-preview avatar-preview">
                <label for="image-upload" id="image-label">Choose File</label>
                <input type="file" name="avatar" id="image-upload" />
            </div>
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Banner</label>
            <div id="image-preview-2" class="image-preview banner-preview">
                <label for="image-upload-2" id="image-label-2">Choose File</label>
                <input type="file" name="banner" id="image-upload-2" />
            </div>
        </div>
        <div class="form-group col-md-4 mb-4">
            <label class="">First name</label>
            <input type="text" name='firstname' value="{{old('firstname',auth()->user()->firstname)}}" class="form-control">
        </div>
        <div class="form-group col-md-4 mb-4">
            <label class="">Last name</label>
            <input type="text" name="lastname" value="{{old('lastname',auth()->user()->lastname)}}" class="form-control">
        </div>
        <div class="form-group col-md-4 mb-4">
            <label class="">Email</label>
            <input type="text" name="email" value="{{old('email',auth()->user()->email)}}" class="form-control">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone',auth()->user()->phone) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Address</label>
            <input type="text" class="form-control" name="address" value="{{ old('address',auth()->user()->address) }}">
        </div>
        <div class="form-group col-md-12 mb-4">
            <label class="">About</label>
            <textarea class="form-control" name="about">{{ old('about',auth()->user()->about) }}</textarea>
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Website</label>
            <input type="text" class="form-control" name="website" value="{{ old('website',auth()->user()->website) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Facebook Link</label>
            <input type="text" class="form-control" name="fb_link" value="{{ old('fb_link',auth()->user()->fb_link) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">X Link</label>
            <input type="text" class="form-control" name="x_link" value="{{ old('x_link',auth()->user()->x_link) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">LinkedIn Link</label>
            <input type="text" class="form-control" name="in_link" value="{{ old('in_link',auth()->user()->in_link) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">WhatsApp Link</label>
            <input type="text" class="form-control" name="wa_link" value="{{ old('wa_link',auth()->user()->wa_link) }}">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class="">Instagram Link</label>
            <input type="text" class="form-control" name="insta_link" value="{{ old('insta_link',auth()->user()->insta_link) }}">
        </div>

        <div class="form-group col-md-6 mb-4">
            <label class=""></label>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>