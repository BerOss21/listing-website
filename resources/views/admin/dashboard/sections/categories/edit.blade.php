@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{route('admin.sections.categories.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Categories</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item">Categories</div>
    <div class="breadcrumb-item active">{{$category->name}}</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.categories.update',$category->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label class="">Background</label>
                                <div id="image-preview" class="image-preview background-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="background" id="image-upload" />
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <label class="">Icon</label>
                                <div id="icon-preview" class="image-preview icon-preview">
                                    <label for="icon-upload" id="icon-label">Choose File</label>
                                    <input type="file" name="icon" id="icon-upload" />
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name',$category->name)}}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Show at home</label>
                                <select name="show_at_home" class="form-control">
                                    <option value="1" @selected(old('show_at_home',$category->show_at_home)==true)>Yes</option>
                                    <option value="0" @selected(old('show_at_home',$category->show_at_home)==false)>No</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status',$category->status)==true)>Active</option>
                                    <option value="0" @selected(old('status',$category->status)==false)>Inactive</option>
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

@push('js')

<script src="{{asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

<script>
    $(function() {
        $('.background-preview').css({
            'background-image': "url({{$category->background}})",
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });

        $('.icon-preview').css({
            'background-image': "url({{$category->icon}})",
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });
    })


    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });

    $.uploadPreview({
        input_field: "#icon-upload", // Default: .icon-upload
        preview_box: "#icon-preview", // Default: .icon-preview
        label_field: "#icon-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>
@endpush