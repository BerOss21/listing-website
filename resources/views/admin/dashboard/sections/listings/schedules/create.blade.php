@extends('admin.layouts.main')

@section('head')
<link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
@endsection

@section('header')
<h1>Schedules</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{ $listing->title }}</div>
    <div class="breadcrumb-item">Schedules</div>
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
                                    <option value="{{$day->value}}">{{Str::title($day->value)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <label for="start time">Start time</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control timepicker">
                                </div>
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
<script src="{{asset('admin/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endpush