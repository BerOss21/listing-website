<div class="my_listing list_mar">
    <h4>change password</h4>
    <form method="post" action="{{route('dashboard.profile')}}">
        @csrf
        @method("put")
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="my_listing_single">
                    <label>current password</label>
                    <div class="input_area">
                        <input type="password" name="current_password" placeholder="Current Password">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="my_listing_single">
                    <label>new password</label>
                    <div class="input_area">
                        <input type="password" name="password" placeholder="New Password">
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="my_listing_single">
                    <label>confirm password</label>
                    <div class="input_area">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="read_btn">Update</button>
            </div>
        </div>
    </form>
</div>