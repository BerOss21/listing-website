@extends('admin.layouts.main')

@section('header')
<h1>Schedules</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{ $listing->title }}</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.schedules.index',$listing->slug)}}">Schedules</a></div>
    <div class="breadcrumb-item">{{$schedule->day}}</div>
    <div class="breadcrumb-item active">Edit</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Schedule section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.listings.schedules.update',[$listing->slug,$schedule->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label for="day">Day</label>
                                <select  id="day" class="select2" disabled>
                                    <option value="{{$schedule->day}}" selected>{{$schedule->day}}</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label for="start_time">Start time</label>
                                <input  type="time" id="start_time" name="start_time" class="form-control" value="{{old('start_time',$schedule->start_time)}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label for="end_time">End time</label>
                                <input type="time" id="end_time" name="end_time" class="form-control" value="{{old('end_time',$schedule->end_time)}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status',$schedule->status)==true)>Active</option>
                                    <option value="0"  @selected(old('status',$schedule->status)==false)>Inactive</option>
                                </select>
                            </div>


                            <div class="form-group col-md-12 mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
