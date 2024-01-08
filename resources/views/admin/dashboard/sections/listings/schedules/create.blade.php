@extends('admin.layouts.main')

@section('head')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- <link rel="stylesheet" href="{{asset('admin/assets/modules/jquery-timepicker/jquery.timepicker.min.css')}}"> -->
@endsection

@section('header')
<h1>Schedules</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{ $listing->title }}</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.schedules.index',$listing->id)}}">Schedules</a></div>
    <div class="breadcrumb-item active">Create</div>
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
                    <form action="{{ route('admin.sections.listings.schedules.store',$listing->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label for="day">Day</label>
                                <select name="day" id="day" class="select2">
                                    @foreach($days as $day)
                                        <option value="{{$day->value}}" @selected(old('day')==$day->value)>{{Str::title($day->value)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label for="start_time">Start time</label>
                                <input type="time" id="start_time" name="start_time" class="form-control" value="{{old('start_time')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label for="end_time">End time</label>
                                <input type="time" id="end_time" name="end_time" class="form-control" value="{{old('end_time')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status')==true)>Active</option>
                                    <option value="0"  @selected(old('status')==false)>Inactive</option>
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

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- <script src="{{asset('admin/assets/modules/jquery-timepicker/jquery.timepicker.min.js')}}"></script> -->
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endpush