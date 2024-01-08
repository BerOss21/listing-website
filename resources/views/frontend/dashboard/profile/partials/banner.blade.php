<div class="my_listing list_mar">
    <form action="{{route('dashboard.profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <h4>Profile Banner Image</h4>
        <div class="row">
            <div class="col-xl-6 col-md-8 col-lg-6">
                <div class="profile_pic_upload banner_pic_upload">
                    <img src="{{auth()->user()->banner}}" alt="img" class="imf-fluid w-100">
                    <input type="file" name="banner">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="read_btn">Update</button>
            </div>
        </div>
    </form>
</div>