@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{route('admin.sections.amenities.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Amenities</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item">Amenities</div>
    <div class="breadcrumb-item active">{{$amenity->name}}</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Amenity section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.amenities.update',$amenity->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name',$amenity->name)}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Icon</label>
                                <div 
                                    data-align="left" 
                                    data-rows="3" 
                                    data-cols="6" 
                                    data-selected-class="btn-primary"
                                    role="iconpicker"
                                    data-icon="{{old('icon',$amenity->icon)}}"
                                    name="icon"
                                >
                                </div>
                            </div>


                            <div class="form-group col-md-6 mb-4">
                                <label>Show at home</label>
                                <select name="show_at_home" class="form-control">
                                    <option value="1" @selected(old('show_at_home',$amenity->show_at_home)==true)>Yes</option>
                                    <option value="0" @selected(old('show_at_home',$amenity->show_at_home)==false)>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status',$amenity->status)==true)>Active</option>
                                    <option value="0" @selected(old('status',$amenity->status)==false)>Inactive</option>
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
