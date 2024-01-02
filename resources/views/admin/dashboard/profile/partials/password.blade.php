<form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    
    <div class="row">
        <div class="form-group col-md-4 mb-4">
            <label class="">Current password</label>
            <input type="password" class="form-control" name="current_password">
        </div>

        <div class="form-group col-md-4 mb-4">
            <label class="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group col-md-4 mb-4">
            <label class="">Password confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group col-md-6 mb-4">
            <label class=""></label>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>