@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{route('admin.sections.packages.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Packages</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item">Packages</div>
    <div class="breadcrumb-item active">Create</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Package section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.packages.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="select2">
                                    @foreach($types as $type)
                                        <option value="{{$type->value}}" @selected(old('type')==$type->value)>{{Str::title($type->value)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Price</label>
                                <input type="number" min="0" name="price" class="form-control" value="{{old('price')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of days</label>
                                <input type="number" name="number_of_days" class="form-control" value="{{old('number_of_days')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of listings</label>
                                <input type="number" name="number_of_listings" class="form-control" value="{{old('number_of_listings')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of photos</label>
                                <input type="number" name="number_of_photos" class="form-control" value="{{old('number_of_photos')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of videos</label>
                                <input type="number" name="number_of_videos" class="form-control" value="{{old('number_of_videos')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of amenities</label>
                                <input type="number" name="number_of_amenities" class="form-control" value="{{old('number_of_amenities')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Number of featured listing</label>
                                <input type="number" name="number_of_featured_listings" class="form-control" value="{{old('number_of_featured_listing')}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Show at home</label>
                                <select name="show_at_home" class="form-control">
                                    <option value="1" @selected(old('show_at_home')==true)>Yes</option>
                                    <option value="0" @selected(old('show_at_home')==false)>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status')==true)>Active</option>
                                    <option value="0" @selected(old('status')==false)>Inactive</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-12 mb-4">
                                <label></label>
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
