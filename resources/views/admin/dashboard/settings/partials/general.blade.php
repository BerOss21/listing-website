<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.settings.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Site Name</label>
                            <input type="text" class="form-control" name="site_name" value="{{ config('settings.site_name',null) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Site Email</label>
                            <input type="text" class="form-control" name="site_email" value="{{ config('settings.site_email',null) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Site Phone</label>
                            <input type="text" class="form-control" name="site_phone" value="{{ config('settings.site_phone',null) }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Site Default Currency</label>
                            <Select name="site_default_currency" class="form-control select2">
                                @foreach($currencies as $key=>$name)
                                    <option value="{{$key}}" @selected(config('settings.site_default_currency',null)==$key)>{{$name}}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Site Timezone</label>
                            <Select name="site_default_timezone" class="form-control select2">
                                @foreach($timezones as $key=>$value)
                                    <option value="{{$key}}" @selected(config('settings.site_default_timezone',null)==$key)>{{$value}}</option>
                                @endforeach
                            </Select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>