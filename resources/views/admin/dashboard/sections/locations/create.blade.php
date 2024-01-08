@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{route('admin.sections.locations.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Locations</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item">Locations</div>
    <div class="breadcrumb-item active">Create</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Location section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.locations.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
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
