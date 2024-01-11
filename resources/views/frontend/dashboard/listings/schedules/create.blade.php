@extends('frontend.dashboard.layouts.main')

@section('dashboard_content')
<div class="my_listing p_xm_0">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="w-full d-flex justify-content-end mb-5">
                        <a href="{{route('dashboard.listings.schedules.index',$listing->id)}}" class="btn btn_submit self-end"><i class="far fa-arrow-left"></i> Schedules</a>
                    </div>
                    <form action="{{ route('dashboard.listings.schedules.store',$listing->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="my_listing_single col-xl-6 col-md-6">
                                <label for="day">Day</label>
                                <select name="day" id="day" class="select_2">
                                    @foreach($days as $day)
                                    <option value="{{$day->value}}" @selected(old('day')==$day->value)>{{Str::title($day->value)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="my_listing_single col-xl-6 col-md-6">
                                <label for="start_time">Start time</label>
                                <input type="time" id="start_time" name="start_time" class="form-control" value="{{old('start_time')}}">
                            </div>

                            <div class="my_listing_single col-xl-6 col-md-6">
                                <label for="end_time">End time</label>
                                <input type="time" id="end_time" name="end_time" class="form-control" value="{{old('end_time')}}">
                            </div>

                            <div class="my_listing_single col-xl-6 col-md-6">
                                <label>Status</label>
                                <select name="status" class="select_2">
                                    <option value="1" @selected(old('status')==true)>Active</option>
                                    <option value="0" @selected(old('status')==false)>Inactive</option>
                                </select>
                            </div>


                            <div class="form-group col-md-12 mb-4">
                                <button type="submit" class="btn_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection