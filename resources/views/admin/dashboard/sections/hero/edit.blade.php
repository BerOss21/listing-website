@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Create New Post</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Posts</a></div>
    <div class="breadcrumb-item">Create New Post</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hero section data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.hero') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <label class="">Background</label>
                                <div id="image-preview" class="image-preview background-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="background" id="image-upload" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control">
                                </div>
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
            'background-image': "url({{$hero->background}})",
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
</script>
@endpush